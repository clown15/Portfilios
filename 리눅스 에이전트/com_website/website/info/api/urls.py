from django.conf.urls import url
from django.contrib import admin

from .views import (
    processListAPIView,
    processDetailAPIView,
    processUpdateAPIView,
    processDeleteAPIView,
    processCreateAPIView,
    processListCreateAPIView,

    resourceListAPIView,
    resourceDetailAPIView,
    resourceUpdateAPIView,
    resourceDeleteAPIView,
    resourceCreateAPIView,
    resourceListCreateAPIView,

    killListAPIView,
    killDetailAPIView,
    killUpdateAPIView,
    killDeleteAPIView,
    killCreateAPIView,
    killListCreateAPIView,

    diskListAPIView,
    diskDetailAPIView,
    diskUpdateAPIView,
    diskDeleteAPIView,
    diskCreateAPIView,
    diskListCreateAPIView,


)


urlpatterns = [
    url(r'^process/$', processListAPIView.as_view(), name='processlist'),
    url(r'^process/(?P<pk>\d+)/$', processDetailAPIView.as_view(), name='processdetail'),
    url(r'^process/(?P<pk>\d+)/edit/$', processUpdateAPIView.as_view(), name='processupdate'),
    url(r'^process/(?P<user>\d+)/delete/$', processDeleteAPIView.as_view(), name='processdelete'),
    url(r'^process/create/$', processCreateAPIView.as_view(), name='processcreate'),
    url(r'^process/listcreate/$', processListCreateAPIView.as_view(), name='processlistcreate'),

    url(r'^resource/$', resourceListAPIView.as_view(), name='resourcelist'),
    url(r'^resource/(?P<pk>\d+)/$', resourceDetailAPIView.as_view(), name='resourcedetail'),
    url(r'^resource/(?P<pk>\d+)/edit/$', resourceUpdateAPIView.as_view(), name='resourceupdate'),
    url(r'^resource/(?P<user>\d+)/delete/$', resourceDeleteAPIView.as_view(), name='resourcedelete'),
    url(r'^resource/create/$', resourceCreateAPIView.as_view(), name='resourcecreate'),
    url(r'^resource/listcreate/$', resourceListCreateAPIView.as_view(), name='resourcelistcreate'),

    url(r'^kill/$', killListAPIView.as_view(), name='killlist'),
    url(r'^kill/(?P<pk>\d+)/$', killDetailAPIView.as_view(), name='killdetail'),
    url(r'^kill/(?P<pk>\d+)/edit/$', killUpdateAPIView.as_view(), name='killupdate'),
    url(r'^kill/(?P<user>\d+)/delete/$', killDeleteAPIView.as_view(), name='killdelete'),
    url(r'^kill/create/$', killCreateAPIView.as_view(), name='killcreate'),
    url(r'^kill/listcreate/$', killListCreateAPIView.as_view(), name='killlistcreate'),

    url(r'^disk/$', diskListAPIView.as_view(), name='disklist'),
    url(r'^disk/(?P<pk>\d+)/$', diskDetailAPIView.as_view(), name='diskdetail'),
    url(r'^disk/(?P<pk>\d+)/edit/$', diskUpdateAPIView.as_view(), name='diskupdate'),
    url(r'^disk/(?P<user>\d+)/delete/$', diskDeleteAPIView.as_view(), name='diskdelete'),
    url(r'^disk/create/$', diskCreateAPIView.as_view(), name='diskcreate'),
    url(r'^disk/listcreate/$', diskListCreateAPIView.as_view(), name='disklistcreate'),


]
