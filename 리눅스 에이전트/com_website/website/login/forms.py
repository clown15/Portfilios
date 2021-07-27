from django import forms
from login.models import *

class accountForm(forms.ModelForm):
    class Meta:
        model = waituser
        fields = ['idname', 'passwd', 'name', 'groupname', 'phonenumber']

class signinForm(forms.ModelForm):
    class Meta:
        model = Account
        fields = ('idname', 'passwd')

class modifyForm(forms.ModelForm):
    class Meta:
        model = Account
        fields = ('passwd', 'groupname', 'phonenumber')
