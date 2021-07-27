from django.db import models
from django.contrib import admin
from login.models import Account
# Create your models here.
class resource(models.Model):
    user = models.ForeignKey(Account, on_delete=models.CASCADE)
    cpu = models.IntegerField()
    memory = models.IntegerField()
    disk = models.IntegerField()

class process(models.Model):
    user = models.ForeignKey(Account, on_delete=models.CASCADE)
    pid = models.IntegerField()
    pname = models.CharField(max_length =100)
    memory = models.FloatField() # 프로세스별 메모리사용량
    cpu = models.FloatField() #프로세스별 CPU이용률
    time = models.DateTimeField(auto_now=True, auto_now_add=False)

class kill(models.Model):
    user = models.ForeignKey(Account, on_delete=models.CASCADE)
    pid = models.IntegerField()

class disk(models.Model):
    user = models.ForeignKey(Account, on_delete=models.CASCADE)
    full = models.FloatField()
    used = models.FloatField()
    rest = models.FloatField()



    #def __unicode__(self):#이거 다 추가해야하나??ㄷ
        #return self.user

    #def __str__(self):
        #return self.user


admin.site.register(process)##############################
admin.site.register(resource)
admin.site.register(kill)
admin.site.register(disk)
