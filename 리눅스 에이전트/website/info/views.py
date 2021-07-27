from django.shortcuts import render
from django.http import HttpResponse
from login.views import *
from info.models import *
from login.models import *
# Create your views here.
def index(request):
    return HttpResponse("<h1>this is the login page coding and create account")

def detail(request, information_id):
    return HttpResponse("<h2>id: "+str(information_id)+"  this is detail info</h2>")

def viewinfo(request, pk, check):
    if check=='True':
        return render(request, 'viewinfo.html', {'info':pk})
    else:
        return HttpResponse('잘못된 접근 로그인하세요')

def viewdetail(request, pk):
    return render(request, 'viewdetail.html', {'detail':pk})
