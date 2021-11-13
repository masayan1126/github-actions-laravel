import React, { useCallback, useState, useEffect } from 'react'
import Quagga from 'quagga'
import TextInput from '../Atoms/TextInput/TextInput'
import RakutenSearchForm from './Form/RakutenSearchForm'

const BarcodeReader = (props) => {
    // const fetchProducts = async (code) => {
    //     await axios.get("/search", {
    //         params:{ "code" :code }
    //     })
    //     .then(res => console.log(res))
    //     .catch(err => console.error(err));
    // }

    useEffect(() => {
        Quagga.init(
            {
                inputStream: { type: 'LiveStream' },
                decoder: {
                    readers: [
                        {
                            format: 'ean_reader',
                            config: {},
                            multiple: false
                        }
                    ]
                }
            },
            (err) => {
                if (!err) {
                    Quagga.start()
                }
            }
        )

        Quagga.onDetected((result) => {
            const code = result.codeResult.code
            // fetchProducts(code);
            document.getElementById('barcode').value = code
        })
    }, [])

    return (
        <div>
            <div id="interactive" className="viewport"></div>
            <RakutenSearchForm
                barcode={props.barcode}
                inputBarCode={props.inputBarCode}
                setBarCode={props.setBarCode}
                fetchRakutenProducts={() => props.fetchRakutenProducts()}
            />
        </div>
    )
}

export default BarcodeReader
