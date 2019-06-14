let clicked_cards = [];
let tiles = [];

// Start a new game by printing a new score and game board
function newGame() {
    let new_game = $.post("scripts/new_game.php", {call_now: "True"});
    new_game.done(function (data) {
        print_cards();
        print_scores();
    });
}

// Call script to print the current scores
function print_scores() {
    let scores_html = $.post("scripts/print_scores.php", {call_now: "True"});
    let scores_container = $('#scores');
    scores_html.done(function(data) {
        scores_container.empty();
        scores_container.append(data.html);
    });
}

// Call script to print cards with current visibility
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
    // Print cards again with clicked picture visible
    turn_tile.done(function (data) {
        print_cards();
    });
    // Check if clicked tile hasn't already been clicked
    // If not, save both picture and tile id
    if (tile_id != tiles[tiles.length-1]){
        clicked_cards.push(picture);
        tiles.push(tile_id);
        // If length of clicked_cards is an even number, go to next round
        if (clicked_cards.length%2 == 0) {
            $.post("scripts/round.php", {call_now: "True"});
            // If picture ids of last two cards match, add 1 to score, make tiles invisible and give user feedback
            if (clicked_cards[clicked_cards.length-2] == clicked_cards[clicked_cards.length-1]) {
                $.post("scripts/score1.php", {call_now: "True"});
                $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                window.setTimeout(function () {
                    $('h1').text("good job").attr("class", "alert alert-success invisible").css("width", "40%").css("margin", "auto");
                    makeInvisible(tiles[tiles.length-2]);
                    makeInvisible(tiles[tiles.length-1]);
                }, 500);
            // If picture ids don't match, make pictures invisible again and give user feedback
            } else {
                $('h1').text("wrong").attr("class", "alert alert-danger").css("width", "40%").css("margin", "auto");
                window.setTimeout(function () {
                    $('h1').text("wrong").attr("class", "alert alert-danger invisible").css("width", "40%").css("margin", "auto");
                    flipCardBack(tiles[tiles.length-2]);
                    flipCardBack(tiles[tiles.length-1]);
                }, 500);
            };
        };
    };
}

// Call script to make picture on card invisible
function flipCardBack(tile_id) {
    let turn_tile = $.post("scripts/flip_back.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

// Call script to make card visible
function makeVisible(card) {
    let tile_id = $(card).attr('tile_id');
    let turn_tile = $.post("scripts/visible.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

// Call script to make card and picture invisible
function makeInvisible(tile_id) {
    let turn_tile = $.post("scripts/invisible.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
}

$(function() {
    newGame();
    // Keep refreshing the score board and game board
    window.setInterval(function () {
        print_cards();
        print_scores();
    }, 200);
});