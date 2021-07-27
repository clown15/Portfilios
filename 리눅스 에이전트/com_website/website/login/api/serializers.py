from rest_framework.serializers import ModelSerializer
from login.models import loginUser, version

class loginUserSerializer(ModelSerializer):
    class Meta:
        model = loginUser
        fields = [
            'pk',
            'user',
            'ip',
        ]

class versionSerializer(ModelSerializer):
    class Meta:
        model = version
        fields = [
            'v',
            'hash',
        ]
