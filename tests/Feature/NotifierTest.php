<?php

use App\Models\User;
use App\Notifications\FacebookNotification;
use App\Notifications\SlackNotification;
use App\Notifications\SMSNotification;
use App\Notifications\UserNotification;
use App\Services\NotifierService;
use Illuminate\Support\Facades\Notification;

it('sends email', function () {
    Notification::fake();
    $user = User::factory()->create();

    (new NotifierService)->handle($user);

    Notification::assertSentToTimes($user, UserNotification::class, 1);

    Notification::assertNotSentTo(
        [$user], FacebookNotification::class,
    );

    Notification::assertNotSentTo(
        [$user], SlackNotification::class,
    );

    Notification::assertNotSentTo(
        [$user], SMSNotification::class,
    );
});

it('sends email, slack and facebook', function () {
    Notification::fake();

    $user = User::factory()
        ->notifiedByFacebook()
        ->notifiedBySlack()
        ->create();

    (new NotifierService)->handle($user);

    Notification::assertSentToTimes($user, UserNotification::class, 1);

    Notification::assertSentTo(
        [$user], FacebookNotification::class,
    );

    Notification::assertSentTo(
        [$user], SlackNotification::class,
    );

    Notification::assertNotSentTo(
        [$user], SMSNotification::class,
    );
});

it('sends every notification', function () {
    Notification::fake();

    $user = User::factory()
        ->notifiedByFacebook()
        ->notifiedBySlack()
        ->notifiedBySMS()
        ->create();

    (new NotifierService)->handle($user);

    Notification::assertSentToTimes($user, UserNotification::class, 1);

    Notification::assertSentTo(
        [$user], FacebookNotification::class,
    );

    Notification::assertSentTo(
        [$user], SlackNotification::class,
    );

    Notification::assertSentTo(
        [$user], SMSNotification::class,
    );
});
