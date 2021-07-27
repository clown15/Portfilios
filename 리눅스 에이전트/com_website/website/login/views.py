from django.shortcuts import render, redirect
from django.http import HttpResponse
from login.forms import *
from login.models import Account, loginUser
from info.urls import *
from info.models import resource, process
# Create your views here.
def signin(request):#로그인 페이지
    #return HttpResponse("<h1>this is the login page coding and create account")
    if request.method == 'POST':
        check = 'False'
        form = signinForm(request.POST)
        list = Account.objects.all()
        loginUserlist = loginUser.objects.all()
        idname = request.POST['idname']
        passwd = request.POST['passwd']
        check = authenticate(list, idname, passwd)
        if check==1:
            ip = get_client_ip(request)
            account = Account.objects.get(idname=idname)
            if not isloginUser(loginUserlist, account, ip):
                loginuser = loginUser(user=account, ip=ip)
                loginuser.save()
            return redirect('viewinfo', pk=account.id, check='True')#관리자라면 계정 리스트 페이지로
        if check==0:
            ip = get_client_ip(request)
            account = Account.objects.get(idname=idname)
            if not isloginUser(loginUserlist, account, ip):
                loginuser = loginUser(user=account, ip=ip)
                loginuser.save()
            return redirect('viewinfo', pk=account.id, check='True')#관리자 아니라면 바로 정보페이지로
        if check==-1:
            return redirect('error', type=0)
    else:
        form = signinForm()
        return render(request, 'signin.html', {'form':form})

def detail(request, Account_id):
    return HttpResponse("<h2>id: "+str(Account_id)+"  this is detail info</h2>")

def accountlist(request, pk):
    temp = Account.objects.get(pk=pk)
    info = process.objects.all()
    if temp.is_supervisor==True:
        list = Account.objects.all()
        return render(request, 'accountlist.html', {'list':list, 'reqid':pk, 'info':info})#
    else:
        return redirect('error')

def create(request):
    if request.method == 'POST':
        form = accountForm(request.POST)
        if form.is_valid():
            list = Account.objects.all()
            idname = request.POST['idname']
            passwd = request.POST['passwd']
            check = authenticate(list, idname, passwd)
            if check==-1:
                form.save()
                return redirect('signin')
            else :
                HttpResponse("중복된 아이디입니다.")
                return redirect("create")
    else:
        form = accountForm()
    return render(request, 'create.html', {'form':form})#

def delAccount(request, pk, reqid):
    delaccount = Account.objects.get(pk=pk)
    delaccount.delete()
    return render(request, 'delAccount.html', {'delaccount':delaccount, 'reqid':reqid})

def modify(request, pk):
    modaccount = Account.objects.get(pk=pk)
    if request.method == 'POST':
        form = modifyForm(request.POST, request.FILES, instance=modaccount)#POST방식으로 모델의 인스턴스를 지정
        if form.is_valid():
            form.save()
            return redirect("signin")
    else:
        form = modifyForm(instance=modaccount)#모델의 인스턴스를 지정
    return render(request, 'modify.html', {'form':form})

def error(request, type):
    return render(request, 'error.html', {'type':type})

def waitlist(request, pk):
    account = Account.objects.get(pk=pk)
    list = waituser.objects.all()
    if account.is_supervisor==True:
        return render(request, 'waitlist.html', {'list':list, 'reqid':pk})
    else:
        return redirect('error', type=0)

def signup(request, pk, type, reqid):
    adduser = waituser.objects.get(pk=pk)
    if type=='1':
        issuper = True
    elif type=='0':
        issuper = False
    account = Account(idname=adduser.idname, passwd=adduser.passwd, 
    name=adduser.name, groupname=adduser.groupname, 
    phonenumber=adduser.phonenumber, is_supervisor=issuper)
    account.save()
    adduser.delete()
    return redirect('waitlist', pk=reqid)

def authenticate(list, idname, passwd):
    for account in list:
        if (account.idname==idname) & (account.passwd==passwd):
            if account.is_supervisor == True:
                return 1
            else:
                return 0
    return -1

def get_client_ip(request):
    x_forwarded_for = request.META.get('HTTP_X_FORWARDED_FOR')
    if x_forwarded_for:
        ip = x_forwarded_for.split(',')[-1].strip()
    else:
        ip = request.META.get('REMOTE_ADDR')
    return ip

def isloginUser(loginUserlist, account, ip):
    for loginuser in loginUserlist:
        if loginuser.user == account:
            loginuser.ip = ip #만약 로그인 되있더라도 다른곳에서 로그인하면변함
            loginuser.save()
            return True
            break
    return False

