---
# These are optional elements. Feel free to remove any of them.
status: accepted
date: 2022-08-18
deciders: Kristin Collins
---
# URL Shortener Feature

## Context and Problem Statement

We need the ability to shorten Fathom Analytic campaign URLs for social media.

## Decision Drivers

* URLs that contain UTM tracking are very long.
* Social media has character limits for posts.
* We might want to update the links we provide advertisers without having to request the change directly from them.

## Flowchart

```mermaid
graph TD
    A[[URL Shortener]] ---> B([Get URL Slug])
    B --> C{Slug Exists in DB?}
    C --> D((Yes))
    C --> E((No))
    D --> F([Track Visit])
    F --> G([Redirect to Long URL])
    E --> H([Throw 404 Error])
```
## ERD
```mermaid
erDiagram
    REDIRECT 
    REDIRECT {
        int id PK "auto increment"
        varchar slug "unique, max(50)"
        text url
        int visits "default 0"
        datetime created_at
        datetime updated_at
        datetime deleted_at "nullable"
    }
```
