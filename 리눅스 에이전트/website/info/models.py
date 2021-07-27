from django.db import models
from login.models import models
# Create your models here.
class information(models.Model):
    idname = models.CharField(max_length =20)
    name = models.CharField(max_length = 20)

    def __str__(self):
        return str(self.id) + '-' +self.idname + ', ' + self.name

class process(models.Model):
    pname = models.CharField(max_length =20)
    pid = models.IntegerField()
    memory = models.IntegerField() # 프로세스별 메모리사용량
    cpu = models.IntegerField() #프로세스별 CPU이용률
    disk = models.IntegerField()
    network = models.IntegerField()
    authen = models.CharField(max_length =20)
    starttime = models.CharField(max_length=20)

