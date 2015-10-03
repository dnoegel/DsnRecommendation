# DsnRecommendation
This is an example, WIP implementation of a recommendation engine for Shopware based on the
neo4j graph database.

# How to use
Get neo4j running
* Go to the [neo4j homepage](neo4j.com/download/) and download the neo4j server
* run the neo4j server (e.g. `./bin/neo4j run`)
* go to the neo4j backend and set / test your password (typically `http://localhost:7474`)

Get this plugin running
* checkout this repo to `engine/Shopware/Plugins/Local/Core/DsnRecommendation`
* run `composer install` in the plugin directory
* install and activate this plugin in the plugin manager or from the console
* in your SW directory run `./bin/console dsn:neo4j:export` in order to export all your order data to neo4j

If everything went well, go to the neo4j backend (`http://localhost:7474`) and run this query: `MATCH (n) RETURN n`.
You should see an output like this:

![neo4j graph](docs/reco.png)

# Status
Currently only the order data is exported, the actual recommendation queries are not yet implemented.
They might look like this:

```
// find customer who ordered same items
MATCH (u:Customer)-[r1:purchased]->(p:item)<-[r2:purchased]-(u2:Customer),
// find items of those customers
(u2:Customer)-[:purchased]->(p2:item)
// only for John
WHERE u.name = "John"
// make sure, that John didn't order that product, yet
AND not (u)-[:purchased]->(p2:item)
// count / group by u2, so every user-path only counts once
RETURN p2.name, count(DISTINCT u2) as frequency
ORDER BY frequency DESC
```

# License

Please see [License File](LICENSE) for more information.