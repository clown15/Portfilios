from django.conf.urls import url
from django.contrib import admin

from .views import (
    loginUserListAPIView,
    loginUserDetailAPIView,
    loginUserUpdateAPIView,
    loginUserDeleteAPIView,
    loginUserCreateAPIView,
    loginUserListCreateAPIView,

    versionListAPIView,
    versionDetailAPIView,
    versionUpdateAPIView,
    versionDeleteAPIView,
    versionCreateAPIView,
    versionListCreateAPIView,

)

urlpatterns = [
    url(r'^loginuser/$', loginUserListAPIView.as_view(), name='loginUserlist'),
    url(r'^loginuser/(?P<pk>\d+)/$', loginUserDetailAPIView.as_view(), name='loginUserdetail'),
    url(r'^loginuser/(?P<pk>\d+)/edit/$', loginUserUpdateAPIView.as_view(), name='loginUserupdate'),
    url(r'^loginuser/(?P<user>\d+)/delete/$', loginUserDeleteAPIView.as_view(), name='loginUserdelete'),
    url(r'^loginuser/create/$', loginUserCreateAPIView.as_view(), name='loginUsercreate'),
    url(r'^loginuser/listcreate/$', loginUserListCreateAPIView.as_view(), name='loginUserlistcreate'),


    url(r'^version/$', versionListAPIView.as_view(), name='versionlist'),
    url(r'^version/(?P<pk>\d+)/$', versionDetailAPIView.as_view(), name='versiondetail'),
    url(r'^version/(?P<pk>\d+)/edit/$', versionUpdateAPIView.as_view(), name='versionupdate'),
    url(r'^version/(?P<user>\d+)/delete/$', versionDeleteAPIView.as_view(), name='versiondelete'),
    url(r'^version/create/$', versionCreateAPIView.as_view(), name='versioncreate'),
    url(r'^version/listcreate/$', versionCreateAPIView.as_view(), name='versioncreate'),

]
