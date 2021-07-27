from django.conf.urls import include, url
from login.views import *
from info.views import *


urlpatterns = [

    url(r'^$', signin, name='signin'),#login and 회원가입 버튼

    url(r'^(?P<Account_id>[0-9]+)/$', detail, name='detail'),

    url(r'^accountlist/(?P<pk>\d+)/$', accountlist, name='accountlist'), #관리자면 이 페이지로 여기서 계정 행을 info로 링크

    url(r'^create/', create, name='create'),#회원가입 버튼 누르면 이페이지로

    url(r'^delAccount/(?P<pk>\d+)/(?P<reqid>\d+)$', delAccount, name='delAccount'),#계정 삭제후 확인페이지

    url(r'^modify/(?P<pk>\d+)/$', modify, name='modify'),#정보 수정 페이지

    url(r'^error/(?P<type>\d+)', error, name='error'),#각종 에러 메시지

    url(r'^waitlist/(?P<pk>\d+)', waitlist, name='waitlist'),

    url(r'^signup/(?P<pk>\d+)/(?P<type>\d+)/(?P<reqid>\d+)$', signup, name='signup'),

    url(r'^info/', include('info.urls'))#info앱의 url 추가
]






