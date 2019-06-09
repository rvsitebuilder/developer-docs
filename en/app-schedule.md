# Schedule and Queue

 > {info} If you are not familiar with its concept. Check out the full [Laravel Task Scheduling documentation](https://laravel.com/docs/master/scheduling) and [Laravel Queues documentation](https://laravel.com/docs/master/queues) to get started. 

## Cron

All RVsitebuilder websites have been set up to run cron.

```php
//TODO: @pam cron command here
```

## Schedule

To set up schedule task without to touch Laravel app/Console/Kernel.php, RVsitebuilder comes with `Scheduler App` which is a wrapper around [Laravel Totem](https://github.com/codestudiohq/laravel-totem). 

To create schedule task, create migrations

```php
// TODO: @pam ใส่ตัวอย่าง job ด้วย

```


## Queue

A lot of RVsitebuilder websites run on shared hosting environment and does not have SSH access to run `Laravel Queue`. 

RVsitebuilder accomodates this by installing `Queuesharedhost App`, it is a wrapper around [queueworker/sansdaemon](https://github.com/orobogenius/sansdaemon) which run Laravel Queue by schedule task every 5 minutes. That means queues are not execute immediately as expected but run every 5 minutes.

If the end-users are not run on shared hosting environment, and have SSH access to the server to run command line.  End-users are suggested to disable `Queuesharedhost App` on RVsitebuilder admin's `Manage App`.

