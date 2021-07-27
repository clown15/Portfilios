from django.db import models

# Create your models here.
class Account(models.Model):
    idname = models.CharField(max_length =20)
    passwd = models.CharField(max_length = 20)
    name = models.CharField(max_length = 20)#이름
    groupname = models.CharField(max_length = 20)#부서이름?
    phonenumber = models.CharField(max_length = 20)#폰번호
    is_supervisor = models.BooleanField()#관리자인지
    cdate = models.DateTimeField(auto_now_add = True)#만든 날짜 자동생성


    def __str__(self):
        return str(self.id) + '-' +self.idname + ', ' + self.name