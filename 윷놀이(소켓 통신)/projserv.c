#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<signal.h>
#include<fcntl.h>
#include<sys/socket.h>
#include<sys/file.h>
#include<sys/types.h>
#include<netinet/in.h>
#include<arpa/inet.h>
#include<unistd.h>
#include<errno.h>
#include<time.h>
//상수
#define OUTSIDE 11      //외부 칸과 선의 개수
#define CHANGE 8        //숫자와 대칭되는 문자열의 갯수
#define PLAYER 2                //플레이어의 수
#define CHARACTERS 4    //플레이어의 캐릭터수
#define INFO 3                  //하나의 캐릭터가 갖고있는 정보의 수 좌표,업혀있는 말의 수
#define POINT 2         //좌표의 수
#define INPUT_INFO 3    //클라이언트에서 넘어오는 정보의 수
#define CASE 3          //말을 움직였을 경우 생기는 경우의수
#define MAXLINE 511
#define MAX_SOCK 1024
//전역변수
//처음 나오는 말의 경우 11,11 한바퀴를 돈 말의 경우 -1,-1
int Player_position[PLAYER][CHARACTERS][INFO]={
        {
                {11,11,0},
                {11,11,0},
                {11,11,0},
                {11,11,0}
        },
        {
                {11,11,0},
                {11,11,0},
                {11,11,0},
                {11,11,0}
        }
};
char *Mapping[CHANGE]={"  ","□ ","─ ","│ ","☆ ","◇ ","★ ","◆ "};
int Map[OUTSIDE][OUTSIDE]={
        {1,2,1,2,1,2,1,2,1,2,1},
        {3,0,0,0,0,0,0,0,0,0,3},
        {1,0,1,0,0,0,0,0,1,0,1},
        {3,0,0,0,0,0,0,0,0,0,3},
        {1,0,0,0,1,0,1,0,0,0,1},
        {3,0,0,0,0,1,0,0,0,0,3},
        {1,0,0,0,1,0,1,0,0,0,1},
        {3,0,0,0,0,0,0,0,0,0,3},
        {1,0,1,0,0,0,0,0,1,0,1},
        {3,0,0,0,0,0,0,0,0,0,3},
        {1,2,1,2,1,2,1,2,1,2,1}
};
int Winner_count[PLAYER]={0,0};         //플레이어의 말이 나간 수
char *EXIT_STRING = "exit";
char *CONNECT_STRING = "Connected to server\n";
char *START_STRING="Game Start\n";
char *END_TURN="your turn\n";
char *RESURT_CASE[CASE]={"success\n","one_more\n","catch\n"};
char *ERROR_CODE="완주한 말을 선택했습니다.\n";
char *RESURT[2]={"LOSE\n","WIN\n"};
int maxfdp1;
int num_chat=0;
int clisock_list[MAX_SOCK];
int listen_sock;

//함수 선언부
void send_map(int player);              //윷놀이 판을 그리는 함수
int move(int player,int choice,int move_point); //이동하는 플레이어의 2차원 배열,이동하고자 하는 말,이동하는 칸 빈칸,같은말이면 0,상대의 말이 있으면 2를 리턴
void move_together(int player,int before_x,int before_y,int after_x,int after_y);       //말이 업혀있는 경우 함께 이동하는걸 처리
void carry(int player,int x,int y);             //말을 업는걸 처리
void remove_player(int player,int x,int y);     //말을 잡는걸 처리
void addClient(int s, struct sockaddr_in *newcliaddr);
void removeClient(int s);
int set_nonblock(int sockfd);
int is_nonblock(int sockfd);
int tcp_listen(int host, int port, int backlog);
void errquit(char *mesg){perror(mesg); exit(1);}
int winner(int player);     //플레이어 승리시 1,진행중 0

int main(int argc,char *argv[]) {
        //char input[6];
        int check,count=0;
        struct sockaddr_in cliaddr;
        char buf[MAXLINE+1];
        int i, j,random,nbyte,accp_sock,addrlen=sizeof(struct sockaddr_in),turn=0;
        fd_set read_fds;

        srand((unsigned)time(NULL));

        if(argc!=2){
                printf("사용법: %s port\n", argv[0]);
                exit(0);
        }
        listen_sock = tcp_listen(INADDR_ANY, atoi(argv[1]), 5);
        if(listen_sock==-1)
                errquit("tcp_listen fail");
        if(set_nonblock(listen_sock)==-1)
                errquit("set_nonblock fail");
        //사용자가 2명이 될때까지 대기
    while(1) {
            if(num_chat<2) {
                accp_sock=accept(listen_sock, (struct sockaddr*)&cliaddr, &addrlen);
                if(accp_sock==-1 && errno!=EWOULDBLOCK)
                        errquit("accept fail");
                else if(accp_sock>0) {
                    clisock_list[num_chat]=accp_sock;
                    if(is_nonblock(accp_sock)!=0&&set_nonblock(accp_sock)<0)
                            errquit("set_nonblock fail");
                    addClient(accp_sock,&cliaddr);
                    send(accp_sock,CONNECT_STRING,strlen(CONNECT_STRING),0);
                    printf("%d번쨰 사용자 추가.\n",num_chat);
                }
            }
            else if(num_chat==2) break;
    }

    for(i=0;i<num_chat;i++) {
        sprintf(buf, "%d\n", i);
        send(clisock_list[i],START_STRING,strlen(START_STRING),0);
        usleep(150);
        //유저 코드 전송
        send(clisock_list[i],buf,strlen(buf),0);
        usleep(150);
        send_map(i);
        usleep(1500);
    }
    send(clisock_list[0],END_TURN,strlen(END_TURN),0);
    while(1) {
        for(i=0;i<num_chat;i++) {
            errno=0;
            bzero(buf,sizeof(buf));
            nbyte=recv(clisock_list[i],buf,MAXLINE,0);
            if(nbyte==0) {
                removeClient(i);
                continue;
            }

            else if(nbyte==-1&&errno==EWOULDBLOCK) {
                //sleep(2);
                i--;
                /*if(count==10000){
                    count=0;
                    send(clisock_list[i],END_TURN,strlen(END_TURN),0);
                }
                count++;*/
                continue;
            }
            /*if(strstr(buf,EXIT_STRING)!=NULL) {
            removeClient(i);
            continue;
            }*/
            else if(nbyte==3){
                count=0;
                buf[nbyte]=0;
                nbyte=0;
                //send(clisock_list[j],buf,nbyte,0);
                check=move(buf[0]-'0',buf[1]-'0',buf[2]-'0');
                
                if((buf[2]-'0'==4||buf[2]-'0'==5)&&check==0) check=1;
                
                for(j=0;j<num_chat;j++){
                    send_map(j);
                }
                sleep(3);
                if(winner(i)==1) {
                    send(clisock_list[i],RESURT[1],strlen(RESURT[1]),0);
                    send(clisock_list[!i],RESURT[0],strlen(RESURT[0]),0);
                }
                if(check==0) {
                    send(clisock_list[!i],END_TURN,strlen(END_TURN),0);
                    send(clisock_list[i],RESURT_CASE[check],strlen(RESURT_CASE[check]),0);
                    //sleep(5);
                }
                else if(check==1||check==2) {
                    send(clisock_list[!i],RESURT_CASE[0],strlen(RESURT_CASE[check]),0);
                    send(clisock_list[i],RESURT_CASE[check],strlen(RESURT_CASE[check]),0);
                    i--;
                    send(clisock_list[!i],END_TURN,strlen(END_TURN),0);
                    //sleep(5);
                }
                else if(check==-1) {
                    send(clisock_list[i],ERROR_CODE,strlen(ERROR_CODE),0);
                    i--;
                }
                
            }
        }
    }

    return 0;
}

void send_map(int player) {
        int i,j;
        char shapes[MAXLINE]="\0";

        for(i=0;i<OUTSIDE;i++) {
                for(j=0;j<OUTSIDE;j++)
                        strcat(shapes,Mapping[Map[i][j]]);
                                strcat(shapes,"\n");
        }
        send(clisock_list[player],shapes,strlen(shapes),0);
}
int move(int player,int choice,int move_point) {
        int i,check=0,before_x,before_y;

        //이동 하기전 말이 있던 위치의 칸을 일반 칸으로 변경
        if(Player_position[player][choice][0]!=11&&Player_position[player][choice][0]!=-1) {
                before_x=Player_position[player][choice][0];
                before_y=Player_position[player][choice][1];
                Map[Player_position[player][choice][0]][Player_position[player][choice][1]]=1;
        }
        //나간말을 선택한 경우
        if(Player_position[player][choice][0]==-1)
                return -1;
        //[0]세로[1]가로
        //한번에 두칸씩 움직이기 때문에 move_pointx2
        move_point=move_point*2;
        //처음 나오는 말의 경우 위치값이 11,11
        if(Player_position[player][choice][0]==11) {
                Player_position[player][choice][0]=10-move_point;
                Player_position[player][choice][1]=10;
        }
        //10,0~10,10
        else if(Player_position[player][choice][0]==10&&Player_position[player][choice][1]>=0) {
                //말이 한바퀴를 돈 경우
            if((Player_position[player][choice][1]+move_point)>10) {
                Player_position[player][choice][0]=-1;
                Player_position[player][choice][0]=-1;
            }
            else {
                Player_position[player][choice][1]+=move_point;
            }
        }
        //0,0~10,10 대각선 이동
        else if(Player_position[player][choice][0]==Player_position[player][choice][1]) {
            for(i=0;i<move_point/2;i++) {
                if((Player_position[player][choice][0]==4&&Player_position[player][choice][1]==4)||(Player_position[player][choice][0]==5&&Player_position[player][choice][1]==5)) {
                    Player_position[player][choice][0]+=1;
                    Player_position[player][choice][1]+=1;
                }
                else {
                    Player_position[player][choice][0]+=2;
                    Player_position[player][choice][1]+=2;
                    if(Player_position[player][choice][0]>10) {
                        Player_position[player][choice][0]=-1;
                        Player_position[player][choice][1]=-1;
                        break;
                    }
                }
            }
        }
        //0,0~10,0
        else if(Player_position[player][choice][0]>=0&&Player_position[player][choice][1]==0) {
                if(Player_position[player][choice][0]==0) {
                        for(i=0;i<move_point/2;i++) {
                                if(Player_position[player][choice][0]==4&&Player_position[player][choice][1]==4) {
                                        Player_position[player][choice][0]+=1;
                                        Player_position[player][choice][1]+=1;
                                }
                                else {
                                        Player_position[player][choice][0]+=2;
                                        Player_position[player][choice][1]+=2;
                                        if(Player_position[player][choice][0]>10) {
                                                Player_position[player][choice][0]=-1;
                                                Player_position[player][choice][1]=-1;
                                                break;
                                        }
                                }
                        }
                }
                else {
                        if((Player_position[player][choice][0]+move_point)>10) {
                                move_point=(move_point+Player_position[player][choice][0])-10;
                                Player_position[player][choice][0]=10;
                                Player_position[player][choice][1]+=move_point;
                        }
                        else {
                                Player_position[player][choice][0]+=move_point;
                        }
                }
        }
        //0,10~10,0 대각이동
        else if((Player_position[player][choice][0]+Player_position[player][choice][1])==10) {
                for(i=0;i<move_point/2;i++) {
                                if((Player_position[player][choice][0]==4&&Player_position[player][choice][1]==6)||(Player_position[player][choice][0]==Player_position[player][choice][1])) {
                                        Player_position[player][choice][0]+=1;
                                        Player_position[player][choice][1]-=1;
                                }
                                else {
                                        if(Player_position[player][choice][0]==10) {
                                                Player_position[player][choice][1]+=2;
                                        }
                                        else {
                                                Player_position[player][choice][0]+=2;
                                                Player_position[player][choice][1]-=2;
                                        }
                                }
                        }
        }
        //0,10~0,0
        else if(Player_position[player][choice][0]==0&&Player_position[player][choice][1]<=10) {
                //0,10의 자리에 있는경우
                if(Player_position[player][choice][1]==10) {
                        for(i=0;i<move_point/2;i++) {
                                if((Player_position[player][choice][0]==4&&Player_position[player][choice][1]==6)||(Player_position[player][choice][0]==Player_position[player][choice][1])) {
                                        Player_position[player][choice][0]+=1;
                                        Player_position[player][choice][1]-=1;
                                }
                                else {
                                        if(Player_position[player][choice][0]==10) {
                                                Player_position[player][choice][1]+=2;
                                        }
                                        else {
                                                Player_position[player][choice][0]+=2;
                                                Player_position[player][choice][1]-=2;
                                        }
                                }
                        }
                }
                //그외의 자리에 있는 경우
                else {
                        if(Player_position[player][choice][1]<move_point) {
                                move_point-=Player_position[player][choice][1];
                                Player_position[player][choice][1]=0;
                                Player_position[player][choice][0]=+move_point;
                        }
                        else {
                                Player_position[player][choice][1]-=move_point;
                        }
                }
        }
        //10,10~0,10
        else if(Player_position[player][choice][0]<=10&&Player_position[player][choice][1]==10) {
                //움직이는 칸의 크기가 현재의 y값보다 큰지 확인
                if(Player_position[player][choice][0]>=move_point)
                        Player_position[player][choice][0]-=move_point;
                else {
                        //움직일려는 값이 현재의 y값보다 크면 y의 값을 0으로 만들고 그차이만큼 움직이고 나머지 만큼 x값을 이동
                        move_point-=Player_position[player][choice][0];
                        Player_position[player][choice][0]=0;
                        Player_position[player][choice][1]-=move_point;
                }
        }

        //빈칸 0,같은말 1,상대말 2
        if(Player_position[player][choice][0]!=-1) {
                //빈칸일 경우
                if(Map[Player_position[player][choice][0]][Player_position[player][choice][1]]==1) {
                        if(Player_position[player][choice][2]!=0) move_together(player,before_x,before_y,Player_position[player][choice][0],Player_position[player][choice][1]);
                        check=0;
                }
                //같은말이 있어 업는경우
                else if((Map[Player_position[player][choice][0]][Player_position[player][choice][1]]==(player+4))||(Map[Player_position[player][choice][0]][Player_position[player][choice][1]]==(player+6))) {
                        check=0;
                        if(Player_position[player][choice][2]!=0) move_together(player,before_x,before_y,Player_position[player][choice][0],Player_position[player][choice][1]);
                        carry(player,Player_position[player][choice][0],Player_position[player][choice][1]);
                }
                //상대의 말을 잡은 경우
                else {
                        check=2;
                        remove_player(!player,Player_position[player][choice][0],Player_position[player][choice][1]);
                }
                if(Player_position[player][choice][2]>0)
                    Map[Player_position[player][choice][0]][Player_position[player][choice][1]]=player+6;
                else
                    Map[Player_position[player][choice][0]][Player_position[player][choice][1]]=player+4;
        }
        else {
            if(Player_position[player][choice][2]!=0) move_together(player,before_x,before_y,Player_position[player][choice][0],Player_position[player][choice][1]);
        }

        for(i=0;i<CHARACTERS;i++) {
            printf("x=%d y=%d\n",Player_position[player][i][0],Player_position[player][i][1]);
            fflush(stdout);
        }
        printf("\n");
        return check;
}
//빈칸이면 0,상대의 말이 있으면 1,내말이 있으면2
void carry(int player,int x,int y) {
        int i,count=0;

        for(i=0;i<CHARACTERS;i++) {
                if(Player_position[player][i][0]==x&&Player_position[player][i][1]==y)
                        count++;
        }

        for(i=0;i<CHARACTERS;i++) {
                if(Player_position[player][i][0]==x&&Player_position[player][i][1]==y)
                        Player_position[player][i][2]=count;
        }
}
void remove_player(int player,int x,int y) {
        int i;

        for(i=0;i<CHARACTERS;i++) {
                if(Player_position[player][i][0]==x&&Player_position[player][i][1]==y) {
                        Player_position[player][i][0]=11;
                        Player_position[player][i][1]=11;
                        Player_position[player][i][2]=0;
                }
        }
}
//말이 업혀있는 경우 함께 이동하는걸 처리
void move_together(int player,int before_x,int before_y,int after_x,int after_y) {
        int i;

        for(i=0;i<CHARACTERS;i++) {
                if(Player_position[player][i][0]==before_x&&Player_position[player][i][1]==before_y) {
                        Player_position[player][i][0]=after_x;
                        Player_position[player][i][1]=after_y;
                }
        }
}

int winner(int player) {
    int i;

    for(i=0;i<CHARACTERS;i++) {
        printf("%d ",Player_position[player][i][0]);
        if(Player_position[player][i][0]!=-1) return 0;
    }
    return 1;
}

void addClient(int s, struct sockaddr_in *newcliaddr){
        char buf[20];
    inet_ntop(AF_INET, &newcliaddr->sin_addr, buf, sizeof(buf));
    printf("new client: %s\n", buf);
    clisock_list[num_chat] = s;
    num_chat++;
}

void removeClient(int s){
        close(clisock_list[s]);
        if(s!=num_chat-1)
                clisock_list[s] = clisock_list[num_chat-1];
        num_chat--;
        printf("채팅 참가자 1명 탈퇴. 현재 참가자 수 = %d\n", num_chat);
}

int tcp_listen(int host, int port, int backlog){
        int sd;
    struct sockaddr_in servaddr;
    sd = socket(PF_INET, SOCK_STREAM, 0);
    if(sd==-1){
        perror("socket fail");
        exit(1);
    }
    bzero((char *)&servaddr, sizeof(servaddr));
    servaddr.sin_family = AF_INET;
    servaddr.sin_addr.s_addr = htonl(host);
    servaddr.sin_port = htons(port);
    if(bind(sd, (struct sockaddr*)&servaddr, sizeof(servaddr))<0){
        perror("bind fail");
        exit(1);
    }
    listen(sd, backlog);
    return sd;
}

int is_nonblock(int sockfd) {
        int val;

        val=fcntl(sockfd,F_GETFL,0);
        if(val&O_NONBLOCK)
                        return 0;
        return -1;
}

int set_nonblock(int sockfd) {
        int val;

        val=fcntl(sockfd,F_GETFL,0);
        if(fcntl(sockfd,F_SETFL,val|O_NONBLOCK)==-1)
                return -1;
        return 0;
}

