from rest_framework.generics import ListAPIView, RetrieveAPIView, DestroyAPIView, UpdateAPIView, CreateAPIView, ListCreateAPIView

from info.models import process, resource, kill, disk
from info.api.serializers import processSerializer, resourceSerializer, killSerializer, diskSerializer
from rest_framework.fields import empty
from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework import status
from django.http import Http404

class processListAPIView(ListAPIView):
    queryset = process.objects.all()
    serializer_class = processSerializer

class processDetailAPIView(RetrieveAPIView):
    queryset = process.objects.all()
    serializer_class = processSerializer

class processUpdateAPIView(UpdateAPIView):
    queryset = process.objects.all()
    serializer_class = processSerializer

class processDeleteAPIView(APIView):
    def delete(self, request, user, format=None):
        delprocess = process.objects.filter(user=user)
        delprocess.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)

class processCreateAPIView(CreateAPIView):
    queryset = process.objects.all()
    serializer_class = processSerializer
    def get_serializer(self, instance=None, data=empty, many=False, partial=False):
        return super(processCreateAPIView, self).get_serializer(instance=instance, data=data, many=True, partial=partial)

class processListCreateAPIView(ListCreateAPIView):
    queryset = process.objects.all()
    serializer_class = processSerializer

class resourceListAPIView(ListAPIView):
    queryset = resource.objects.all()
    serializer_class = resourceSerializer

class resourceDetailAPIView(RetrieveAPIView):
    queryset = resource.objects.all()
    serializer_class = resourceSerializer

class resourceUpdateAPIView(UpdateAPIView):
    queryset = resource.objects.all()
    serializer_class = resourceSerializer

class resourceDeleteAPIView(APIView):
    def delete(self, request, user, format=None):
        delresource = resource.objects.filter(user=user)
        delresource.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)


class resourceCreateAPIView(CreateAPIView):
    queryset = resource.objects.all()
    serializer_class = resourceSerializer

class resourceListCreateAPIView(ListCreateAPIView):
    queryset = resource.objects.all()
    serializer_class = resourceSerializer

class killListAPIView(ListAPIView):
    queryset = kill.objects.all()
    serializer_class = killSerializer

class killDetailAPIView(RetrieveAPIView):
    queryset = kill.objects.all()
    serializer_class = killSerializer

class killUpdateAPIView(UpdateAPIView):
    queryset = kill.objects.all()
    serializer_class = killSerializer

class killDeleteAPIView(APIView):
    def delete(self, request, user, format=None):
        delkill = kill.objects.filter(user=user)
        delkill.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)

class killCreateAPIView(CreateAPIView):
    queryset = kill.objects.all()
    serializer_class = killSerializer

class killListCreateAPIView(ListCreateAPIView):
    queryset = kill.objects.all()
    serializer_class = killSerializer


class diskListAPIView(ListAPIView):
    queryset = disk.objects.all()
    serializer_class = diskSerializer

class diskDetailAPIView(RetrieveAPIView):
    queryset = disk.objects.all()
    serializer_class = diskSerializer

class diskUpdateAPIView(UpdateAPIView):
    queryset = disk.objects.all()
    serializer_class = diskSerializer

class diskDeleteAPIView(APIView):
    def delete(self, request, user, format=None):
        deldisk = disk.objects.filter(user=user)
        deldisk.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)

class diskCreateAPIView(CreateAPIView):
    queryset = disk.objects.all()
    serializer_class = diskSerializer

class diskListCreateAPIView(ListCreateAPIView):
    queryset = disk.objects.all()
    serializer_class = diskSerializer

