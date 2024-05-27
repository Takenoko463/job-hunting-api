# job-list-api

# アプリケーション概要
就活状況をまとめるwebアプリのバックエンド側です。

# webサイト
まだ、deployしておりません。

# 利用方法

## 就活状況一覧取得 
### request
### path
```
http://43.207.6.215/api/user/1/job_hunting_statuses
```

### response
```json
[
    {
        "id": 9,
        "priority": 3,
        "corporation": {
            "id": 29,
            "name": "株式会社 渚",
            "address": "1325812  大分県田辺市東区山口町鈴木7-2-1 ハイツ渡辺101号",
            "home_page": "http://hamada.org/"
        },
        "user_id": 1,
        "way": {
            "id": 0,
            "name": "paiza",
            "url": "https://paiza.jp/en_try/"
        },
        "note": "ほうりに直なおしているよ」「あ、すすきとおっかくしいえずかでたままや。",
        "status": {
            "id": 2,
            "name": "書類選考"
        },
        "submit": "2024-05-23",
        "interview1": "2024-05-23",
        "interview2": "2024-05-23",
        "interview_last": "2024-05-23"
    }
]
```

## 就活状況登録
### path
```
http://43.207.6.215/api/job_hunting_statuses
```
### request
```json
{
        "priority":4, 
        "user_id": 2,
        "corporation_id": 18,
        "way_id": 2,
        "note": "validation　request投稿確認テストです。",
        "status_id": 3,
        "submit": "2024-05-20",
        "interview1": "2024-05-26",
        "interview2": "2024-06-20"
}
```
### response
```json
{
    "id": 11,
    "priority": 4,
    "corporation": {
        "id": 18,
        "name": "有限会社 廣川",
        "address": "3974456  新潟県石田市東区高橋町田中10-4-2 コーポ西之園102号",
        "home_page": "https://www.nakajima.com/id-vitae-non-earum-qui-sed-qui-ipsa-reprehenderit"
    },
    "user_id": 2,
    "way": {
        "id": 2,
        "name": "Green",
        "url": "https://www.green-japan.com/"
    },
    "note": "validation　request投稿確認テストです。",
    "status": {
        "id": 3,
        "name": "一次選考"
    },
    "submit": "2024-05-20",
    "interview1": "2024-05-26",
    "interview2": "2024-06-20",
    "interview_last": null
}
```
## 就活状況編集
### path
```
put http://43.207.6.215/api/job_hunting_statuses/37
```
### request
```json
{
        "priority":4, 
        "user_id": 2,
        "corporation_id": 18,
        "way_id": 2,
        "note": "validation　request編集確認テストです。",
        "status_id": 3,
        "submit": "2024-05-20",
        "interview1": "2024-05-26",
        "interview2": "2024-06-20"
}
```
### response
```json
{
    "id": 11,
    "priority": 4,
    "corporation": {
        "id": 18,
        "name": "有限会社 廣川",
        "address": "3974456  新潟県石田市東区高橋町田中10-4-2 コーポ西之園102号",
        "home_page": "https://www.nakajima.com/id-vitae-non-earum-qui-sed-qui-ipsa-reprehenderit"
    },
    "user_id": 2,
    "way": {
        "id": 2,
        "name": "Green",
        "url": "https://www.green-japan.com/"
    },
    "note": "validation　request編集確認テストです。",
    "status": {
        "id": 3,
        "name": "一次選考"
    },
    "submit": "2024-05-20",
    "interview1": "2024-05-26",
    "interview2": "2024-06-20",
    "interview_last": null
}
```
## 就活状況詳細
### path
```
get http://43.207.6.215/api/job_hunting_statuses/11
```
### response
```json
{
    "id": 11,
    "priority": 4,
    "corporation": {
        "id": 18,
        "name": "有限会社 廣川",
        "address": "3974456  新潟県石田市東区高橋町田中10-4-2 コーポ西之園102号",
        "home_page": "https://www.nakajima.com/id-vitae-non-earum-qui-sed-qui-ipsa-reprehenderit"
    },
    "user_id": 2,
    "way": {
        "id": 2,
        "name": "Green",
        "url": "https://www.green-japan.com/"
    },
    "note": "validation　request編集確認テストです。",
    "status": {
        "id": 3,
        "name": "一次選考"
    },
    "submit": "2024-05-20",
    "interview1": "2024-05-26",
    "interview2": "2024-06-20",
    "interview_last": null
}
```

## 就活状況消去
### path
```
delete http://43.207.6.215/api/job_hunting_statuses/11
```

## アプリケーションを作成した背景
このアプリケーションを作成した背景は私自身の就活進捗を共有しやすくするためです。google spread sheetではスマホから見にくいと家族から苦情をもらいました。また、他のアプリを用いるためにはログインを必要とするため共有に向きません。そこで、このアプリを作成しテックキャンプのキャリア相談担当者と自分の家族に就活の状況を伝えやすくしようと考えています。

# DataBase setting
## Table
### job_hunting_statuses
|Column|Type|Options|
| --- | --- | --- |
|corporation|references|null: false|
|user|references|null:false|
|way_id|integer|null:false|
|note|string|nullable,max:255|
|status_id|integer|null:false|
|submit|date|nullable|
|interview1|date|nullable|
|interview2|date|nullable|
|interview_last|date|nullable|

### corporations
|Column|Type|Options|
| --- | --- | --- |
|name|string|null:false|
|address|string|null:false|
|home_page|string|null:false|

### user
|Column|Type|Options|
| --- | --- | --- |
|name|string|null:false|
|email|string|null:false,unique|
|email_verified_at|string|nullable|
|password|string||