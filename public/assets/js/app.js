$(window).ready(() => {
    let newSubmissionIndex = 5
    $(document).on('click','.approve-form-btn', function (e) {
        e.preventDefault();
        var parentRow = $(this).parent().parent()
        console.log($(this).attr('href'))
        var url = $(this).attr('href')
        var comment_data = $(this).parent().parent().find('.table-comment').val()
        submitStatus(url, comment_data).then((res) => {
            if (res == 'approved') {
                parentRow.find('.status-col').html('<p class="form-status alert alert-success">Approved</p>')
                parentRow.find('.table-comment').prop("disabled", true)
                parentRow.find('.approve-form-btn').remove()
                parentRow.find('.reject-form-btn').remove()
            }
        })
    })

    $(document).on('click','.reject-form-btn', function (e) {
        e.preventDefault();
        var parentRow = $(this).parent().parent()
        console.log($(this))
        var url = $(this).attr('href')
        var comment_data = $(this).parent().parent().find('.table-comment').val()
        submitStatus(url, comment_data).then((res) => {
            if (res == 'approved') {
                parentRow.find('.status-col').html('<p class="form-status alert alert-danger">Rejected</p>')
                parentRow.find('.table-comment').prop("disabled", true)
                parentRow.find('.approve-form-btn').remove()
                parentRow.find('.reject-form-btn').remove()
            }
        })
    })

    $('.approve-user-btn').on('click', function (e) {
        e.preventDefault();
        var parentRow = $(this).parent().parent()
        console.log($(this).attr('href'))
        var url = $(this).attr('href')

        submitUserStatus(url).then(res => {
            if (res == 'approved') {
                parentRow.find('.user-status').html('<p class="form-status alert alert-success user-alert">Approved</p>')
                parentRow.find('.approve-user-btn').remove()
                parentRow.find('.reject-user-btn').remove()
            }
        })
    })

    $('.reject-user-btn').on('click', function (e) {
        e.preventDefault();
        var parentRow = $(this).parent().parent()
        console.log($(this).attr('href'))
        var url = $(this).attr('href')

        submitUserStatus(url).then(res => {
            if (res == 'approved') {
                parentRow.find('.user-status').html('<p class="form-status alert alert-danger user-alert">Rejected</p>')
                parentRow.find('.approve-user-btn').remove()
                parentRow.find('.reject-user-btn').remove()
            }
        })
    })

    $('#new-submission-more-btn').on('click', function () {
        $('.new-submission-loading').html('<h4>Loading..</h4>')
        getNewSubmissions(newSubmissionIndex).then(res => {
            console.log(res)
            $('.new-submission-loading').empty()
            if (res.length == 0) {
                $('.new-submission-loading').html('<h4>No more records.</h4>')
            } else {
                res.forEach(element => {
                    $('.new-submission-table-body').append(newSubmissionRowHtml(element))
                });
            }
        })
        newSubmissionIndex += 5
    })



    //vessel deposit form calculator------------------------------------------
    var inSubTotal = 0
    var outSubTotal = 0

    $('.in_qty').keyup(function(){
        var rate = '.'+$(this).data('name')
        var qty = parseFloat($(this).val())
        var rateVal = parseFloat($(this).parent().parent().find(rate).text())
        var amount = Math.round((qty * rateVal) * 100) / 100 
        
        $(this).parent().parent().find('.in_amount').text(amount)
        if($(this).val() == ''){
            $(this).parent().parent().find('.in_amount').text('0')
        }
        inSubTotal = calculateSubtotal('.in_amount')
        $('.sub-total-inward').text(inSubTotal)

        $('.total-deposit').text('$ '+(Math.round((inSubTotal + outSubTotal) * 100) / 100))
    })
    $('.out_qty').keyup(function(){
        var rate = '.'+$(this).data('name')
        var qty = parseFloat($(this).val())
        var rateVal = parseFloat($(this).parent().parent().find(rate).text())
        var amount = Math.round((qty * rateVal) * 100) / 100
        
        $(this).parent().parent().find('.out_amount').text(amount)
        if($(this).val() == ''){
            $(this).parent().parent().find('.out_amount').text('0')
        }
        outSubTotal = calculateSubtotal('.out_amount')
        $('.sub-total-outward').text(outSubTotal)
        $('.total-deposit').text('$ '+(Math.round((inSubTotal + outSubTotal) * 100) / 100))
    })

    function calculateSubtotal(amountClassName){
        var subTotal = 0
        $(amountClassName).each(function() {
            subTotal += parseFloat($(this).text());
        });
        return subTotal;
    }
    //------------------------------------------------------------------------
})







//ajax
function submitStatus(url, commentText) {
    return new Promise((res, rej) => {
        $.ajax({
            url: url,
            dataType: 'JSON',
            type: 'post',
            data: { comment: commentText, '_method': 'POST', '_token': $('meta[name="csrf-token"]').attr('content') },
            success: function (result) {
                res(result)
            },
            error: function (err) {
                rej(err)
            }
        })
    })
}

function submitUserStatus(url) {
    return new Promise((res, rej) => {
        $.ajax({
            url: url,
            dataType: 'JSON',
            type: 'post',
            data: { '_method': 'POST', '_token': $('meta[name="csrf-token"]').attr('content') },
            success: function (result) {
                res(result)
            },
            error: function (err) {
                rej(err)
            }
        })
    })
}

function getNewSubmissions(index) {
    return new Promise((res, rej) => {
        $.ajax({
            url: base_url + '/fp-admin/get-new-submission',
            dataType: 'JSON',
            type: 'post',
            data: { index: index, '_method': 'POST', '_token': $('meta[name="csrf-token"]').attr('content') },
            success: function (result) {
                res(result)
            },
            error: function (err) {
                rej(err)
            }
        })
    })
}

//generate html
function newSubmissionRowHtml(formData) {
    var statusHtml = '';
    var linkHtml = '';
    if (formData.status == 0) {
        statusHtml = '<p class="form-status alert alert-dark">Pending</p>'
        linkHtml = /*html*/`
        <a href="${base_url+'/fp-admin/form-approve/'+formData.ref_number}" class="approve-btn approve-form-btn">APPROVED</a>
        <a href="${base_url+'/fp-admin/form-reject/'+formData.ref_number}" class="reject-btn reject-form-btn">REJECT</a>
            `
    } else if (formData.status == 1) {
        statusHtml = '<p class="form-status alert alert-success">Approved</p>'
    } else {
        statusHtml = '<p class="form-status alert alert-danger">Rejected</p>'
    }

    return /*html*/`
            <tr>
                <td class="tbbody-color1 table-width-type1">${moment(formData.created_at).format('DD/MM/YY')}</td>
                <td class="tbbody-color1">${moment(formData.created_at).format('HH:mm')}</td>
                <td class="tbbody-color1 table-width-type1">${formData.port}</td>
                <td class="tbbody-color1 table-width-type1">${formData.username}</td>
                <td class="tbbody-color1">${formData.ref_number}</td>
                <td class="tbbody-color1">${formData.company}</td>
                <td class="tbbody-color1 status-col">
                   ${ statusHtml}
                </td>
                <td class="tbbody-color1 table-width-type2">
                    <textarea ${formData.status != 0 ? 'disabled' : ''} class="table-comment" name="form-comment" rows="4" cols="5"
                    placeholder="Comment..">${formData.comment == null ? '' : formData.comment}</textarea>
                </td>
                <td class="tbbody-td-button">
                    ${linkHtml}

                    <a href="${ base_url+'/fp-admin/download/' + formData.ref_number }"><img src="../assets/images/icons/download-icon.png" alt=""></a>
                            <a href="${ base_url+'/fp-admin/form-view/' + formData.ref_number}" target="_blank">View</a>
                </td>
            </tr>
    `
}