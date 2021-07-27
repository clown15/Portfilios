from django.conf.urls import include, url
from django.contrib import admin

urlpatterns = [
    url(r'^admin/', admin.site.urls),
    url(r'^', include('login.urls')),
    #url(r'^info/', include('info.urls')),
    url(r'^api/info/', include('info.api.urls')),
    url(r'^api/login/', include('login.api.urls')),
]
