from bs4 import BeautifulSoup
import urllib.request
import urllib.parse
import csv
from datetime import datetime

def readData():
    soup=BeautifulSoup(urllib.request.urlopen('https://www.skuniv.ac.kr/academic_calendar').read(),'html.parser')
    dataresult=[]
    res=soup.find('table',{'class':'sku-table'})
    res=res.find('tbody')
    month=""
    search=['개강','중간시험','기말시험','수강신청','개강','중간고사','기말시험','수강신청']
    Search_size=8
    count=0
    # 학교 홈페이지에 있는 학사일정 에서 정보를 읽어오는 부분
    for n in res('tr') :
        total_month = n.find('th');
        # 월정보를 가져옴
        if(total_month!=None):
            month=total_month.get_text()
        datadic = []
        datadic.append(month)
        # 일정보를 가져옴
        for data in n('td'):
            text = data.get_text()
            datadic.append(text)
        if count<Search_size:
            if search[count] in datadic[3]:
                datadic[1]=datadic[1]
                dataresult.append(datadic)
                count=count+1
    # 얻어온 정보를 파일로 저장하는 부분
    path="./00csv/"+str(datetime.today().year)+".csv"
    f=open(path,'w')
    wr=csv.writer(f)
    for i in dataresult:
        wr.writerow(i)
    f.close

readData()
