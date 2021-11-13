import React, { useCallback, useState, useEffect } from 'react'
import BarcodeReader from '../BarcodeReader'
import Button from '../../Atoms/Button/Button'
import ListWithImage from '../../Molecules/List/ListWithImage'
import BasicForm from '../../Molecules/Form/BasicForm'

const AddStockModal = (props) => {
    return (
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Modal title
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <BarcodeReader
                            barcode={props.barcode}
                            inputBarCode={props.inputBarCode}
                            setBarCode={props.setBarCode}
                            fetchRakutenProducts={() =>
                                props.fetchRakutenProducts()
                            }
                        />
                        <ListWithImage list={props.list} />
                    </div>
                    <div class="modal-footer">
                        <BasicForm
                            action={'/stocks/store'}
                            method={'POST'}
                            buttonName={'追加'}
                            data={props.list}
                        ></BasicForm>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AddStockModal
