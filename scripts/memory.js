function newGame() {
    let new_game = $.post("scripts/new_game.php", {call_now: "True"});
    new_game.done(function (data) {
        print_cards();
    });
}

function print_cards() {
    let cards_html = $.post("scripts/game_board.php", {call_now: "True"});
    let game_container = $('#game_board');
    cards_html.done(function(data) {
        game_container.empty();
        game_container.append(data.html);
        $('.tile').click(function () {
            makeVisible(this);
        }); 
    });
}

function makeVisible(card) {
    let tile_id = $(card).attr('tile_id');
    let turn_tile = $.post("scripts/visible.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

function makeInvisible(card) {
    let tile_id = $(card).attr('tile_id');
    let turn_tile = $.post("scripts/invisible.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

$(function() {
    newGame();
    window.setInterval(function () {
        print_cards();
    }, 2000);
});