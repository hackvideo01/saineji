   function deleteRestaurant(id) {
      option = confirm('削除したいですか？')
      if(!option) {
        return;
      }

      console.log(id)
      $.post("delete_restaurant.php", {
        id: id
      }, function(data) {
        alert(data)
        location.reload()
      })
    }