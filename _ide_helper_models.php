<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\DailyVaccination
 *
 * @property int $id
 * @property int $district_id
 * @property int $daily_dose_1
 * @property int $daily_dose_2
 * @property int $day_difference
 * @property int $day_total
 * @property string $reference_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\District $districts
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination query()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereDailyDose1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereDailyDose2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereDayDifference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereDayTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereReferenceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyVaccination whereUpdatedAt($value)
 */
	class DailyVaccination extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\District
 *
 * @property int $id
 * @property string $area
 * @property int $area_id
 * @property string $reference_date
 * @property int $total_distinct_persons
 * @property int $total_dose_1
 * @property int $total_dose_2
 * @property int $total_vaccinations
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DailyVaccination[] $dailyVaccinations
 * @property-read int|null $daily_vaccinations_count
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereReferenceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereTotalDistinctPersons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereTotalDose1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereTotalDose2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereTotalVaccinations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

