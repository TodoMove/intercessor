# Intercessor

[![StyleCI](https://styleci.io/repos/70615078/shield?style=flat)](https://styleci.io/repos/70615078)

Intermediate/standardised classes to handle tasks, folders, projects, labels, tags for todo applications.  

This will be used as an intermediary between different todo list managers: OmniFocus, Wunderlist, Todoist to start with.

## Installation

`composer require todomove/intercessor`

* Projects must link to folders if they have them
* Tasks and projects must link to each other

## Task

```php
$task = (new Task('Buy lipstick'))
    ->flagged(true)
    ->defer(new \DateTime('+3 weeks'))
    ->due(new \DateTime('+6 weeks'))
    ->notes("Maybelline, shade 'Tangerine Heart'\nDon't spend more than £3.22")
    ->tags($tags)
    ->project(new Project('Title of project'));
```

## Repeat

```php
$repeat = new Repeat();
$repeat->daily();
$repeat->weekly();
$repeat->biweekly();
$repeat->fortnightly();
$repeat->monthly();
$repeat->bimonthly();
$repeat->yearly();
$repeat->everyMorning(); // 6 am
$repeat->everyNight(); // 8 pm

$repeat->count(6)->type(Repeat::MONTH);

$repeat->daily()
    ->nextDate(new \DateTime('2016-10-15 08:00:00')); // Returns DateTime object for '2016-10-16 08:00:00'
```

## Tasks

```php
$tasks = new Tasks([
    $task1, $task2
]);

$tasks->add($task3);
```

## Project

```php
$project = new Project('Title of project');
$project
    ->tags($tags)
    ->tasks($tasks)
    ->status(Project::ACTIVE)
    ->repeat(new Repeat())
    ->review(new Repeat());
```


## Tag

```php
$tag = new Tag('errands'); // Personally always lowercase
```

## Tags

```php
$tags = new Tags();
$tags->add(new Tag('shopping'));
$tags->add(new Tag('today'));
```
