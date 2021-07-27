#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#include<strings.h>
#include<fcntl.h>
#include<sys/socket.h>
#include<sys/time.h>
#include<netinet/in.h>
#include<arpa/inet.h>
#include<unistd.h>
#include<time.h>
//상수
#define INFO 3  //서버에 보내는 데이터의 수
#define CASE 5  //윷을 던져 나오는 경우의 수
#define MAXLINE 1000
#define NAME_LEN 20
//전역 변수
char *mapping[]={"도","개","걸","윷","모"};
char *START_STRING="Game Start\n";
char *START_TURN="your turn\n";
char *END_TURN="success\n";
char *WIN="WIN\n";
char *LOSE="LOSE\n";
char *ERROR_CODE="완주한 말을 선택했습니다.\n";
//함수
int tcp_connect(int af,char *servip,unsigned short port);
void errquit(char *mesg) {perror(mesg);exit(1);}

int main(int argc,char *argv[]) {
        int random,user_code=-1;
        char characters,buf[MAXLINE];
        char bufall[MAXLINE+NAME_LEN],*bufmsg;
        int maxfdp1,s,namelen,nbyte;
        fd_set read_fds;

        srand((unsigned)time(NULL));



        if (argc!=4) {
                printf("사용법:%s server_ip port name\n",argv[0]);
                exit(0);
        }

        sprintf(bufall,"[%s]:",argv[3]);
        namelen=strlen(bufall);
        bufmsg=bufall+namelen;
        printf("msg:%s",bufmsg);

        s=tcp_connect(AF_INET,argv[1],atoi(argv[2]));
        if(s==-1)
                errquit("tcp_connect fail");

        puts("서버에 접속되었습니다.");
        maxfdp1=s+1;
        FD_ZERO(&read_fds);

        while(1) {
                FD_SET(0,&read_fds);
                FD_SET(s,&read_fds);
                if(select(maxfdp1,&read_fds,NULL,NULL,NULL)<0)
                        errquit("select fail");
                if(FD_ISSET(s,&read_fds)) {
                    //bzero(buf,sizeof(buf));
                    if((nbyte=recv(s,buf,MAXLINE,0))>0) {
                        buf[nbyte]=0;
                        if(nbyte>5&&user_code==-1)
                            printf("%s",buf);

                        if(buf[0]=='0'||buf[0]=='1'){
                            user_code=buf[0]-'0';
                        }

                        if(user_code!=-1){
                        	printf("%s",buf);
                            while(1) {
                                //if(strcmp(buf,START_TURN)==0) break;
                                bzero(buf,sizeof(buf));
                                nbyte=recv(s,buf,MAXLINE,0);
                                buf[nbyte]=0;

                                if(strstr(buf,END_TURN)==NULL)
                                    printf("%s",buf);
                                if(strstr(buf,ERROR_CODE)!=NULL) break;
                                    random=rand()%5;
                                //if(strcmp(buf,START_TURN)==0)
                                if(strstr(buf,WIN)!=NULL) {
                                    printf("승리했습니다.\n");
                                    return 0;
                                }
                                else if(strstr(buf,LOSE)!=NULL) {
                                    printf("패배했습니다.\n");
                                    return 0;
                                }
                                else if(strstr(buf,START_TURN)!=NULL)
                                    break;
                                else if(strcmp(buf,END_TURN)==0)
                                    printf("상대턴\n",buf);
                            }
                            
                            printf("%s(이)가 나왔습니다.\n",mapping[random]);
                            while(1) {
                                printf("몇번 말을 이동하시겠습니까?(1~4)");
                                scanf("%c",&characters);
                                
                                getchar();

                                if('1'<=characters&&characters<='4') break;
                                else {
                                    printf("잘못입력했습니다.(%d~%d)를 입력하세요.\n",1,4);
                                }

                            }
                            printf("%c번째 말을 이동합니다.\n",characters);
                            bzero(buf,sizeof(buf));
                            sprintf(buf,"%d%c%d",user_code,characters-1,random+1);
                            send(s,buf,strlen(buf),0);
                        }


                    }
                }
                /*if(FD_ISSET(0,&read_fds)) {
                        if(fgets(bufmsg,MAXLINE,stdin)) {
                                if(send(s,bufall,namelen+strlen(bufmsg),0)<0)
                                        puts("Error:Write error on socket.");
                        }
                }*/
        }

        return 0;
}

int tcp_connect(int af,char *servip,unsigned short port) {
        struct sockaddr_in servaddr;
        int s;
        if((s=socket(af,SOCK_STREAM,0))<0)
                return -1;
        bzero((char*)&servaddr,sizeof(servaddr));
        servaddr.sin_family=af;
        inet_pton(AF_INET,servip,&servaddr.sin_addr);
        servaddr.sin_port=htons(port);

        if(connect(s,(struct sockaddr *)&servaddr,sizeof(servaddr))<0)
                return -1;
        return s;
}

