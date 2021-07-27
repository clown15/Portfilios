from selenium import webdriver
from bs4 import BeautifulSoup

position=[1,2,3,4,5,6]
room=6
info=5
out=[['' for j in range(info)] for i in range(room)]
options=webdriver.ChromeOptions()
options.add_argument("headless")
options.add_argument("disable-gpu")
dirver=webdriver.Chrome('C:/Users/SKUINC-Internship/Desktop/Web/Python/chromedriver',chrome_options=options)
dirver.implicitly_wait(3)
i=0
while i<room:
    dirver.get('http://203.249.122.208/seat_info/index.asp?nowpage=%d'%position[i])
    dirver.switch_to_frame('if_count')
    html=dirver.page_source
    soup=BeautifulSoup(html,'html.parser')
    temp=soup.select('span#Layer110')
    j=0
    for n in temp:
        out[i][j]=n.text.strip()
        j=j+1
    i=i+1

for room in out:
    for info in room:
        print(info)
dirver.quit()


