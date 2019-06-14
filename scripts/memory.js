let clicked_cards = [];
let tiles = [];

function newGame() {
    let new_game = $.post("scripts/new_game.php", {call_now: "True"});
    new_game.done(function (data) {
        print_cards();
        print_scores();
    });
}

function print_scores() {
    let scores_html = $.post("scripts/print_scores.php", {call_now: "True"});
    let scores_container = $('#scores');
    scores_html.done(function(data) {
        scores_container.empty();
        scores_container.append(data.html);
    });
}

function print_cards() {
    let cards_html = $.post("scripts/game_board.php", {call_now: "True"});
    let game_container = $('#game_board');
    cards_html.done(function(data) {
        game_container.empty();
        game_container.append(data.html);
        $('.tile').click(function () {
            flipCard(this);
        });
    });
}

function flipCard(card) {
    let tile_id = $(card).attr('tile_id');
    let picture = $(card).attr('picture');
    let turn_tile = $.post("scripts/flip.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
    if (tile_id != tiles[tiles.length-1]){
        clicked_cards.push(picture);
        tiles.push(tile_id);
        if (clicked_cards.length%2 == 0) {
            $.post("scripts/round.php", {call_now: "True"});
            if (clicked_cards[clicked_cards.length-2] == clicked_cards[clicked_cards.length-1]) {
                $.post("scripts/score1.php", {call_now: "True"});
                window.setTimeout(function () {
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    makeInvisible(tiles[tiles.length-2]);
                    makeInvisible(tiles[tiles.length-1]);
                }, 500);
            } else {
                window.setTimeout(function () {
                    $('h1').text("wrong").attr("class", "alert alert-danger").css("width", "40%").css("margin", "auto");
                    flipCardBack(tiles[tiles.length-2]);
                    flipCardBack(tiles[tiles.length-1]);
                }, 500);
            };
        };
    };
}

function flipCardBack(tile_id) {
    let turn_tile = $.post("scripts/flip_back.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

function makeVisible(card) {
    let tile_id = $(card).attr('tile_id');
    let turn_tile = $.post("scripts/visible.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

function makeInvisible(tile_id) {
    let turn_tile = $.post("scripts/invisible.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

$(function() {
    newGame();
    window.setInterval(function () {
        print_cards();
        print_scores();
    }, 2000);
});