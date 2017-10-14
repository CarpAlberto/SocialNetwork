  $('#edit_rel').contextPopup({
  title: 'My Popup Menu',
  items: [
    {label:'Some Item',     icon:'icons/shopping-basket.png', action:function() { alert('clicked 1') } },
    {label:'Another Thing', icon:'icons/receipt-text.png',    action:function() { alert('clicked 2') } },
    null, /* null can be used to add a separator to the menu items */
    {label:'Blah Blah',     icon:'icons/book-open-list.png',  action:function() { alert('clicked 3') }, isEnabled:function() { return false; } },
  ]});