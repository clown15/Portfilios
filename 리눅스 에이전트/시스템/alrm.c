#include <unistd.h>
#include <signal.h>
//#include <siginfo.h>
#include <stdio.h>
#include <stdlib.h>

void handler(int signo){
	system("top -n 1 > ab.txt");
}

int main()
{
	sigset(SIGALRM,handler);
	alarm(5);
	printf("Wait \n");
	sleep(100);
	printf("슬립 \n");
	return 0;

}
