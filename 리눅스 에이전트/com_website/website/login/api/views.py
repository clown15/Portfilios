from rest_framework.generics import ListAPIView, RetrieveAPIView, DestroyAPIView, UpdateAPIView, CreateAPIView, ListCreateAPIView

from login.models import loginUser, version
from login.api.serializers import loginUserSerializer, versionSerializer
from rest_framework.fields import empty
from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework import status
from django.http import Http404

class loginUserListAPIView(ListAPIView):
    queryset = loginUser.objects.all()
    serializer_class = loginUserSerializer

class loginUserDetailAPIView(RetrieveAPIView):
    queryset = loginUser.objects.all()
    serializer_class = loginUserSerializer

class loginUserUpdateAPIView(UpdateAPIView):
    queryset = loginUser.objects.all()
    serializer_class = loginUserSerializer

class loginUserDeleteAPIView(APIView):
    def delete(self, request, user, format=None):
        delloginUser = loginUser.objects.filter(user=user)
        delloginUser.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)

class loginUserCreateAPIView(CreateAPIView):
    queryset = loginUser.objects.all()
    serializer_class = loginUserSerializer
    def get_serializer(self, instance=None, data=empty, many=False, partial=False):
        return super(loginUserCreateAPIView, self).get_serializer(instance=instance, data=data, many=True, partial=partial)

class loginUserListCreateAPIView(ListCreateAPIView):
    queryset = loginUser.objects.all()
    serializer_class = loginUserSerializer


class versionListAPIView(ListAPIView):
    queryset = version.objects.all()
    serializer_class = versionSerializer

class versionDetailAPIView(RetrieveAPIView):
    queryset = version.objects.all()
    serializer_class = versionSerializer

class versionUpdateAPIView(UpdateAPIView):
    queryset = version.objects.all()
    serializer_class = versionSerializer

class versionDeleteAPIView(APIView):
    def delete(self, request, user, format=None):
        delversion = version.objects.filter(user=user)
        delversion.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)

class versionCreateAPIView(CreateAPIView):
    queryset = version.objects.all()
    serializer_class = versionSerializer
    def get_serializer(self, instance=None, data=empty, many=False, partial=False):
        return super(versionCreateAPIView, self).get_serializer(instance=instance, data=data, many=True, partial=partial)

class versionListCreateAPIView(ListCreateAPIView):
    queryset = version.objects.all()
    serializer_class = versionSerializer

