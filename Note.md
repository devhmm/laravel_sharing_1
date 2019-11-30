# Laravel Sharing 
###### Shared By Ayar Hlaine

## Eloquent
Eloquent ဆိုတာ class file တွေပဲ။ Database ကို access,relationship တွေလုပ်ဖို့

##### One To One
1. one to one (Parent To Child) 
   - hasOne
   - $this->hasOne('App\RelatedModel')
   - သက်ဆိုင်ရာ Model တစ်ခုရဲ့ data တွေပဲရမယ် 
2. inverse of one to one (Child To Parent) 
   - belongsTo
   - $this->belongsTo('App\RelatedModel')
   - သက်ဆိုင်ရာ Model တစ်ခုရဲ့ data တွေပဲရမယ်

###### * Note * 
Relationship တိုင်းမှာ Nameming Format မှားနေရင်ပဲ ဖြစ်ဖြစ် ။ Primary Key မဟုတ်တဲ့ key တွေနဲ့ချိတ်ချင်တဲ့ အခါ Relationship ရေးတဲ့ အခါ တစ်ခြား key တွေထပ်ထည့်ပေးရမယ်။         
ဉပမာ

```$this->hasOne('App\RelatedModel', 'foreign_key', 'local_key');```
# 
##### One To Many
1. one to many (Parent To Child) 
   - hasMany
   - $this->hasMany('App\RelatedModel')
   - သက်ဆိုင်ရာ Model တွေရဲ့ data တွေ ကို Collection အနေနဲ့ရမယ်
2. inverse of one to many (Child To Parent) 
   - belongsTo
   - $this->belongsTo('App\RelatedModel')
   - သက်ဆိုင်ရာ Model တစ်ခုရဲ့ data တွေပဲရမယ်

# 
##### Many To Many
1. many to many 
   - belongsToMany
   - $this->belongsToMany('App\RelatedModel')
   - သက်ဆိုင်ရာ Model တွေရဲ့ data တွေ ကို Collection အနေနဲ့ရမယ်
2. inverse of many to many
   - belongsToMany
   - $this->belongsToMany('App\RelatedModel')
   - သက်ဆိုင်ရာ Model တွေရဲ့ data တွေ ကို Collection အနေနဲ့ရမယ်
   
**Example**
$this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');

| Related Model  |  Pivot Table  | localkey in Pivot  | foreign_key in Pivot  | 

Pivot Table က data တွေယူချင်ရင်တော့

```$this->belongsToMany('App\Role')->withPivot('column1', 'column2');```

Pivot Table က create_at,deleted_at တွေယူချင်ရင်တော့

```$this->belongsToMany('App\Role')->withTimestamps();```

Pivot Table ကို condition တွေထည့်ချင်ရင်တော့

```$this->belongsToMany('App\Role')->wherePivot('approved', 1);```
# 
##### Relationship Existence
Existence
```has('relationship')```

###### Add Condition

```Post::whereHas('comments', function ($query) {```

    $query->where('content', 'like', 'foo%');

```})->get()```

# 
Absence

```doesntHave('relationship')```
###### Add Condition
```App\Post::whereDoesntHave('comments', function ($query) {```

    $query->where('content', 'like', 'foo%');

```})->get();```

Conting Related Model

```Model::withCount('relation')->get();```