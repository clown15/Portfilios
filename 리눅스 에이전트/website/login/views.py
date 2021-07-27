from django.shortcuts import render, redirect
from django.http import HttpResponse
from login.forms import *
from login.models import Account
from info.urls import *
# Create your views here.
def signin(request):#로그인 페이지
    #return HttpResponse("<h1>this is the login page coding and create account")
    if request.method == 'POST':
        check = 'False'
        form = signinForm(request.POST)
        list = Account.objects.all()
        idname = request.POST['idname']
        passwd = request.POST['passwd']
        check = authenticate(list, idname, passwd)
        if check==1:
            account = Account.objects.get(idname=idname)
            return redirect('accountlist', pk=account.id)#관리자라면 계정 리스트 페이지로
        if check==0:
            account = Account.objects.get(idname=idname)
            return redirect('viewinfo', pk=account.id, check='True')#관리자 아니라면 바로 정보페이지로
        if check==-1:
            return redirect('error')
    else:
        form = signinForm()
        return render(request, 'signin.html', {'form':form})

def detail(request, Account_id):
    return HttpResponse("<h2>id: "+str(Account_id)+"  this is detail info</h2>")

def accountlist(request, pk):
    temp = Account.objects.get(pk=pk)
    if temp.is_supervisor==True:
        list = Account.objects.all()
        return render(request, 'accountlist.html', {'list':list, 'reqid':pk})#
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
    #delaccount.delete()
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
    return render(request, 'error.html')

def authenticate(list, idname, passwd):
    for account in list:
        if (account.idname==idname) & (account.passwd==passwd):
            if account.is_supervisor == True:
                return 1
            else:
                return 0
    return -1


