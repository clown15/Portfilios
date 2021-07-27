#include<stdio.h>
#include<stdlib.h>
#include<unistd.h>

int main(void){
	pid_t pid[2];
	int i=0;
	while(i<2){
		pid[i] = fork();
		if(pid[i]<0) printf("에러\n");
		else if(pid[i]==0){
			switch(i){
				case 0: execl("./popentop", "popentop", NULL); break;
				case 1: execl("./popendf", "popendf", NULL); break;
			}
		}
		i++;
	}
	while(wait(NULL) != -1);
	//부모 프로세스 자리
	//여기서 이 파일들 서버로 바로 보낼건지(서버에서 파일내용 가공 도식화?)
	printf("자식 프로세스 모두 종료\ninfo파일들 생성\n");
	return 0;
}

