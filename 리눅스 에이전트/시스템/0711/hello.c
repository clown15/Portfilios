#include <stdlib.h>
#include <stdio.h>
typedef struct {
	char data[1000];
}inform;


int main()
{
	FILE *rfp;
	inform in[1000];
	//char a[10000][10000];
	int n;
	int i=0;
	if((rfp = fopen("topinfo.txt","r")) ==NULL){
		perror("fopen");
		exit(1);
	}
	
	printf("data \n");
	while(( n=fscanf(rfp,"%s",&in[i].data )) !=EOF ) {
		printf("정보 %s\n",in[i].data);
		i++;
	}
	fclose(rfp);
	
	return 0;
}
