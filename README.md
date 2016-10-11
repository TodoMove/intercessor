# Intercessor
Intermediate/central classes to handle tasks, folders, projects, labels, tags for todo applications.  This will be used as an intermediary between different applications.


## Task

```php
$tags = new Tags();
$tags->add(new Tag('shopping'));
$tags->add(new Tag('today'));

$task = (new Task('Buy lipstick'))
    ->flagged(true)
    ->defer(new \DateTime('+3 weeks'))
    ->due(new \DateTime('+6 weeks'))
    ->notes("Maybelline, shade 'Tangerine Heart'\nDon't spend more than £3.22")
    ->tags($tags)
    ->project(new Project('Title of project'));
```
