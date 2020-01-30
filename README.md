# redis-demos
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

### What is Redis?
- In-memory data structure store
- Robust [data types](https://redis.io/topics/data-types): strings, hashes, lists, sets, **sorted sets**
- Can use as cache, db, etc.
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

### Why is Redis better than Memcached?
- **Data types are very powerful**
- **Excellent support for [atomic operations/transactions](https://redis.io/topics/transactions)**
- More robust caching features: pick from [8 eviction policies](https://redis.io/topics/lru-cache)
- Exponentially better built in metrics/stats: [global info](https://redis.io/commands/info), [global memory-specific info](https://redis.io/commands/info), [key-specific memory info](https://redis.io/commands/memory-usage)
- and more!
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

### Redis sorted sets
- Non-repeating collection of strings, each member with an integer score
- Easy/efficient to add, remove, update elements
- Easy/efficient to get, remove multiple items by score ranges, index ranges, etc.
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

### Architecture challenge #1: show a near-real-time count of users currently browsing a popular website
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

### Architecture challenge #2: build an ultra-efficient way to record client usage of an API, then atomically consumable by a cron/processor
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
