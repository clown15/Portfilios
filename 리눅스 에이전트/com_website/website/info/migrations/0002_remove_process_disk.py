# Generated by Django 2.1 on 2018-11-23 05:13

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('info', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='process',
            name='disk',
        ),
    ]
