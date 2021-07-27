from django.conf.urls import url
from . import views

urlpatterns = [

    url(r'^$', views.index, name='index'),

    url(r'^information/(?P<pk>\d+)+(?P<check>\w+)/$', views.viewinfo, name='viewinfo'),

    url(r'^information/detail/(?P<pk>\d+)$', views.viewdetail, name='viewdetail'),
    url(r'^killprocess/(?P<processpk>\d+)/(?P<reqid>\d+)$', views.killProcess, name='killProcess'),

]
