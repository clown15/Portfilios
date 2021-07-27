#include<string.h>
#include <unistd.h>
#include <signal.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/time.h>

void handler(){
	char buf[BUFSIZ], *result;
	FILE *fp, *wfp;
	int count = 0;
	fp = popen("top -n 1", "r");//poen하면 함수내부적으로 
	
	wfp = fopen("topinfo.txt", "w");
	
	while(fgets(buf, sizeof(buf), fp)!=NULL){
		count++;
		if(count>7){//top명령어 결과 7줄 건너뛴거 필요없는 7줄
			result = strtok(buf, " \t");
			result = strtok(NULL, " \t");//top 명령어는 공백부터 시작이므로 한번 더 토큰라이즈 
			while(result != NULL){
				fprintf(wfp, "%-8s", result);
				printf("\n%d\n", count++);//확인
				result = strtok(NULL, " \t");
			}
		}
	}
	fclose(wfp);
	pclose(fp);
}

int main(void){
	struct itimerval it;
	
	sigset(SIGALRM,handler);
	it.it_value.tv_sec = 2;
	it.it_value.tv_usec = 0;
	it.it_interval.tv_sec = 2;
	it.it_interval.tv_usec = 0;
	
	if(setitimer(ITIMER_REAL,&it,(struct itimerval *)NULL) == -1){
		perror("setitimer");
		exit(1);
	
	}
	
	while (1) {
		if (getitimer(ITIMER_REAL,&it) == -1 ) {
			perror("getitimer");
			exit(1);
		}
		printf("%d sec, %d msec.\n", (int)it.it_value.tv_sec,(int)it.it_value.tv_usec);
		sleep(1);
	}
	
	
	return 0;
}

