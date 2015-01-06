jQuery(document).ready(function($) {

	$('.feralf_form input').each(function() {
	  var $this = $(this);
	  if($this.val() === '') {
	    $this.val($this.attr('title'));
	  }
	  $this.focus(function() {
	    if($this.val() === $this.attr('title')) {
	      $this.val('');
	    }
	  });
	  $this.blur(function() {
	    if($this.val() === '') {
	      $this.val($this.attr('title'));
	    }
	  });
	});
});