from django.db import models
from django.contrib import admin

# Create your models here.
class Account(models.Model):
    idname = models.CharField(max_length =20)
    passwd = models.CharField(max_length = 20)
    name = models.CharField(max_length = 20)#이름
    groupname = models.CharField(max_length = 20)#부서이름?
    phonenumber = models.CharField(max_length = 20)#폰번호
    is_supervisor = models.BooleanField()#관리자인지i
    cdate = models.DateTimeField(auto_now_add = True)#만든 날짜 자동생성


    def __str__(self):
        return str(self.id) + '-' +self.idname + ', ' + self.name

class loginUser(models.Model):
    user = models.ForeignKey(Account, on_delete=models.CASCADE)
    ip = models.CharField(max_length=20)
    
class waituser(models.Model):
    idname = models.CharField(max_length =20)
    passwd = models.CharField(max_length = 20)
    name = models.CharField(max_length = 20)#이름
    groupname = models.CharField(max_length = 20)#부서이름?
    phonenumber = models.CharField(max_length = 20)#폰번호
    cdate = models.DateTimeField(auto_now_add = True)#만든 날짜 자동생성

class version(models.Model):
    v = models.IntegerField()
    hash = models.CharField(max_length=100)



admin.site.register(loginUser)
admin.site.register(Account)
admin.site.register(waituser)
admin.site.register(version)
