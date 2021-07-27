from django.shortcuts import render
from django.http import HttpResponse
from login.views import *
from info.models import *
from login.models import *
# Create your views here.
def index(request):
    return HttpResponse("<h1>this is the login page coding and create account")

def viewinfo(request, pk, check):
    if check=='True':
        account = Account.objects.get(pk=pk)
        disklist = disk.objects.get(user=pk)
        infolist = process.objects.filter(user=pk)
        return render(request, 'chart.html', {'account':account, 'infolist':infolist, 'disk':disklist})
    else:
        return HttpResponse('잘못된 접근 로그인하세요')

def viewdetail(request, pk):
    account = Account.objects.get(pk=pk)
    infolist = process.objects.filter(user=pk)
    return render(request, 'viewdetail.html', {'account':account, 'infolist':infolist})

def killProcess(request, processpk, reqid):
    killprocess = process.objects.get(pk=processpk)
    if killprocess is None:
        return redirect('viewdetail', pk=reqid)
    newkill = kill(user=killprocess.user, pid=killprocess.pid)
    newkill.save()
    return redirect('viewdetail', pk=reqid)
