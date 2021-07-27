#include<stdio.h>
#include<unistd.h>
#include<stdlib.h>
#include<string.h>

int main(void){
	char buf[BUFSIZ], *result;
	FILE *fp, *wfp;
	int count = 0;
	fp = popen("df", "r");//poen하면 함수내부적으로 
	//fork실행후 exec군 계열 실행한것을 파이프오픈
	wfp = fopen("dfinfo.txt", "w");
	
	while(fgets(buf, sizeof(buf), fp)!=NULL){
		count++;
		if(count>1){//top명령어 결과 1줄 건너뛴거
			result = strtok(buf, " \t"); 
			while(result != NULL){
				fprintf(wfp, "%-10s", result);
				result = strtok(NULL, " \t");
			}
		}
	}
	fclose(wfp);
	pclose(fp);
	
	return 0;
}

//문제는 popen() 쓰는 것과 그냥 pipe() 쓰는 것의 차이가 클까? pipe()써야하나?
//파일에 저장하는 것이 아닌 구조체로 받아서 통신?으로 보낼수 있나
