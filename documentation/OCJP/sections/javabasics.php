<div class="page-header"><h3>Java Basic Notes</h3><hr class="notop"></div>
<ul>
<li>
	<p> Remember that by default floating point numbers in Java are double, so when declaring
	a float, you must add an &#39;f&#39; after it, otherwise compilation fails. Similarly, integer
	numbers are by default integers. When passing ints into methods that require data
	types such as short, it is necessary to cast.</p>

</li>
<li><p> Whilst Integer can be boxed to int, Integer[] cannot be boxed into int[].</p></li>
<li><p> Interface methods are implicitly public, regardless of the declaration. Therefore, classes
implementing an interface must make all implemented methods public.</p></li>
<li><p> Remember that when dealing with anonymous inner classes, any method local variables
that are accessed must be declared final.</p></li>
<li><p> Static methods cannot be overridden to be non-static, and vice versa. This will result in
a compilation error.</p></li>
<li><p> Any code after a &#39;throw&#39; as well as &#39;return&#39; statement  is unreachable, and so will result in a compilation error.</p></li>
<li><p> Two objects that are equal (as determined by equals()) must return the same hashcode.
The reverse however is not true - two objects that are not equal can return equal
hashcodes.</p></li>
<li><p> Static initialization blocks are called once per class. Instance initialization blocks are
called once per constructor call - they are call directly after all super-constructors are
called, and before the constructor runs.</p></li>
<li><p> The finalize() method is only ever run by the JVM zero or once. If an object is saved
from being GC&#39;ed through the finalize() method, the next time the object can be GC&#39;ed,
finalize() won&#39;t be called. This does not count calls to finalize that weren&#39;t invoked
through the GC process.</p></li>
<li><p>The finalize() method does not implicitly call the super.finalize() method. This must be
done explicitly if desired. </p></li>
<li><p> It is illegal to compare a primitive type to an array type.</p></li>
<li><p> It is legal for the left hand side of the instanceof operator to be null.</p></li>
<li><p> It is legal to pass an int into a method which expects a float - Java will convert this
automatically. Similar for long into double. In other words, Java will cast automatically
into any type that is wider, even if it is floating point rather than integer.</p></li>
</ul>
