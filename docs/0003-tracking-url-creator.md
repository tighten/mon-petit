---
# These are optional elements. Feel free to remove any of them.
status: accepted
date: 2022-08-24
deciders: Kristin Collins
---
# UTM URL Creator

## Context and Problem Statement

URM urls need to be created using the UTM settings.

## Decision Drivers

* URL parameters need to follow the same format.
* UTM URLs need to be stored for reference.

## Decision Outcome

The URL creator will include a dropdown list for each UTM parameter defined
as a setting.

## Flowchart

```mermaid
graph TD
    A[[UTM URL Creator]] ---> B([Display Form to User])
    B --> C{Valid Input?}
    C --> D((Yes))
    C --> E((No))
    E --> B
    D --> F{Base URL has Params?}
    F --> G((Yes))
    G --> H([Add Base URL Params to UTM Params])
    F --> J((No))
    H --> K([Build Query String from Params])
    J --> K
    K --> L([Get Base URL with no Query String])
    L --> M([Attach Query String to Base URL])
    M --> N{Built URL valid?}
    N --> O((Yes))
    N --> P((No))
    O --> Q([Return new URL])
    P --> B
```

## ERD

```mermaid
erDiagram
    TRACKING_LINK 
    TRACKING_LINK {
        int id PK "auto increment"
        varchar base_url "max(255)"
        varchar campaign "max(255)"
        varchar source "max(255)"
        varchar medium "nullable, max(255)"
        varchar content "nullable, max(255)"
        varchar term "nullable, max(255)"
        datetime created_at
        datetime updated_at
        datetime deleted_at "nullable"
    }
```
