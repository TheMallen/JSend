### JSend

This lightweight JSend library was built because I needed an easy way to write responses to REST queries. I wanted
to use a standard that was simple and clear, and I found one in [JSend](http://labs.omniti.com/labs/jsend).
I tried my best to create a jQueryesque fluent interface for it. Basically everything is chainable, and mutators
are get/set hybrids.

TODO: The ability to pass a jSend output into a jSend constructor would almost certainly be a good idea. In many cases
they will be processed by javascript, but sometimes multiple php processes may need to send eachother jsons.

### Updates
* Added security prefixing.

### Installing

For composer, add `"themallen/jsend": "dev-master"` to your `require` object.

For anyone else, just `git clone` the repo into your desired folder and add it to whatever include_path or autoloader
solution you're using. For example, in codeigniter you would install it to the `application/libraries` folder.

### Example usage

#### Configure a jSend manually
You simply use the mutators passing in your desired data.
You can echo the object directly in your response thanks to __toString() automagically `json_encode`ing for you.
```
    <?php
       $jSend = new \themallen\JSend();

       echo $jSend->data(array(...))
             ->message('some message');
             ->status('success');
             ->output();
```

#### Shortcut functions
You don't have to be a rubyist to appreciate one liners. `JSend` has some shortcut methods so you can produce
common message formats easily.  Shortcuts are chainable, and as a result you can one line creating and echoing
jSend objects as long as you don't need to much fancy business.

* `success($data)` sets the status to `success` and passes any input to the `data` field.
```
       echo (new JSend())->success(array(...));
```

* `fail` sets the status to fail and passes any input to the `message` field.
```
       echo (new JSend())->fail('You messed up!');
```

* `error` sets the status to error and passes any input to the `message` feld.
```
       echo (new JSend())->error('We messed up!');
```
### Getting values out of a jSend.
You can use any of the mutator methods to access property values.

```
       $jSend = new \themallen\JSend();

       echo $jSend->data(array('messageId' => $generator->makeAnId()))
                   ->message('some message');
                   ->status('success');
                   ->output();
       $db->store($jSend->data()['messageId']);
```


#### Contributing
If you feel like making this better, feel free to open a pull request! Even some tests or something would be pretty rad.

