from rest_framework.serializers import ModelSerializer
from info.models import resource, process, kill, disk


class processSerializer(ModelSerializer):
    #def __init__(self, *args, **kwargs):
        #many = kwargs.pop('many', True)
        #super(processSerializer, self).__init__(many=many, *args, **kwargs)
    class Meta:
        model = process
        fields = [
            'pk',
            'user',
            'pid',
            'pname',
            'memory',
            'cpu',
            'time',
        ]

class resourceSerializer(ModelSerializer):
    class Meta:
        model = resource
        fields = [
            'pk',
            'user',
            'cpu',
            'memory',
            'disk'
        ]

class killSerializer(ModelSerializer):
    class Meta:
        model = kill
        fields = [
            'pk',
            'user',
            'pid',
        ]

class diskSerializer(ModelSerializer):
    class Meta:
        model = disk
        fields = [
            'pk',
            'user',
            'full',
            'used',
            'rest',
        ]
