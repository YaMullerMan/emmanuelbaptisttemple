// script for mobile nav functionality
const navClose = document.getElementsByClassName('mobile-nav-x')[0];
const navContainer = document.getElementsByClassName('mobile-nav-container')[0];
const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)

navClose.addEventListener("click", (e) => {
    let target = e.currentTarget;
    if (target.classList.length <= 1) {
        target.classList.toggle('open');
        navContainer.style.padding = "30px 50px 30px 0";
        navContainer.style.width = "100%";
        navContainer.style.opacity = "1";
    } else {
        navContainer.style.width = "0";
        navContainer.style.padding = "30px 0 0 0";
        target.classList.toggle('open');
        navContainer.style.opacity = "0";
    }
});

// switching between ministries
const ministries = document.querySelectorAll('.ministry-icon');
// switching between ministries
const ministries = document.querySelectorAll('.ministry-icon');
if (ministries) {
    ministries.forEach((ministry) => {
        ministry.addEventListener("click", (event) => {
            let currentTab = document.querySelector('.ministry-icon.active');
            let newTab = event.target.closest('.ministry-icon');
            let currentContent = document.querySelector('.ministry-item.active');
            let newContent = document.querySelector(`.ministry-item[data-ministry="${newTab.getAttribute("data-ministry")}"]`);
            newTab.classList.toggle('active');
            currentTab.classList.toggle('active');
            newContent.classList.toggle('active');
            currentContent.classList.toggle('active');
        })
    })
}

// for sermons page search functionality
jQuery(document).ready(function ($) {
    console.log('doc is ready');
    function loadSearchResults(page = 1) {
        console.log('load results');
        var searchQuery = $("#ajax-search").val();
        var postType = $("input[name='post_type']").val();
        var startDate = $("#start-date").val();
        var endDate = $("#end-date").val();

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                action: "ajax_search",
                s: searchQuery,
                post_type: postType,
                paged: page,
                start_date: startDate, // Send start date
                end_date: endDate,     // Send end date
            },
            beforeSend: function () {
                $("#search-results").html("<p>Searching...</p>");
            },
            success: function (response) {
                $("#search-results").html(response);
            },
        });
    }

    // Handle form submission
    $("#ajax-search-form").submit(function (e) {
        e.preventDefault();
        loadSearchResults(1);
    });

    // Handle pagination clicks
    $(document).on("click", ".ajax-pagination a", function (e) {
        e.preventDefault();
        var page = $(this).data("page");
        loadSearchResults(page);
    });
});

if (window.location.href.includes('ministries/?id')) {
    const url = new URL(window.location.href);
    const userId = url.searchParams.get('id');
    const target = document.querySelector(`.ministry-icon[data-ministry="${userId}"`);
    target.click();
}