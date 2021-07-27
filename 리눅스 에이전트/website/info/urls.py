from django.conf.urls import url
from . import views

urlpatterns = [

    url(r'^$', views.index, name='index'),

    url(r'^(?P<information_id>[0-9]+)/$', views.detail, name='detail'),

    url(r'^information/(?P<pk>\d+)+(?P<check>\w+)/$', views.viewinfo, name='viewinfo'),

    url(r'^information/detail/(?P<pk>\d+)$', views.viewdetail, name='viewdetail'),

]