<div class="payment-form-section">
    <h4 class="mb-4">{{ __('Make a Payment') }}</h4>
    <form id="paymentForm" method="POST" action="{{ route('payment.process') }}">
        @csrf
        
        <!-- Amount Field -->
        <div class="form-group mb-3">
            <label for="amount" class="form-label">{{ __('Amount (LKR)') }}</label>
            <input type="number" class="form-control" id="amount" name="amount" 
                   min="100" step="1" required
                   placeholder="Enter amount in LKR">
            <div class="invalid-feedback">Please enter a valid amount (minimum LKR 100).</div>
        </div>
        
        <!-- Payment Method Selection -->
        <div class="form-group mb-4">
            <label class="form-label">{{ __('Payment Method') }}</label>
            
            <div class="payment-method-options">
                <!-- Card Payment Option -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment_method" 
                           id="card" value="card" checked>
                    <label class="form-check-label" for="card">
                        <i class="fas fa-credit-card me-2"></i> {{ __('Credit/Debit Card') }}
                    </label>
                </div>
                
                <!-- Card Details (shown when card is selected) -->
                <div id="cardDetails" class="payment-method-details mb-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" 
                                   placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expiryDate" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="expiryDate" 
                                   placeholder="MM/YY">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="123">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="cardHolder" class="form-label">Card Holder Name</label>
                            <input type="text" class="form-control" id="cardHolder" 
                                   placeholder="Full Name">
                        </div>
                    </div>
                </div>
                
                <!-- PayPal Option -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment_method" 
                           id="paypal" value="paypal">
                    <label class="form-check-label" for="paypal">
                        <i class="fab fa-paypal me-2"></i> {{ __('PayPal') }}
                    </label>
                </div>
                
                <!-- Direct Debit Option -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment_method" 
                           id="direct_debit" value="direct_debit">
                    <label class="form-check-label" for="direct_debit">
                        <i class="fas fa-university me-2"></i> {{ __('Bank Transfer') }}
                    </label>
                </div>
                
                <!-- Direct Debit Details -->
                <div id="bankDetails" class="payment-method-details mb-3" style="display:none;">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="accountNumber" class="form-label">Account Number</label>
                            <input type="text" class="form-control" id="accountNumber" 
                                   placeholder="Enter your account number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bankName" class="form-label">Bank Name</label>
                            <select class="form-select" id="bankName">
                                <option selected disabled>Select your bank</option>
                                <option>Bank of Ceylon</option>
                                <option>People's Bank</option>
                                <option>Commercial Bank</option>
                                <option>Hatton National Bank</option>
                                <option>Sampath Bank</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <input type="text" class="form-control" id="branch" 
                                   placeholder="Branch name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Terms and Conditions -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="termsCheck" required>
            <label class="form-check-label" for="termsCheck">
                {{ __('I agree to the') }} <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a>
            </label>
        </div>
        
        <!-- Submit Button -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-lock me-2"></i> {{ __('Pay Now') }}
            </button>
        </div>
    </form>
</div>

<!-- Terms and Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Your payment will be processed securely. By proceeding, you agree to our terms of service and privacy policy.</p>
                <p>All payments are final and non-refundable unless otherwise stated in our refund policy.</p>
                <p>For any issues with your payment, please contact our support team.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Show/hide payment method details based on selection
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.payment-method-details').forEach(detail => {
                detail.style.display = 'none';
            });
            
            if (this.value === 'card') {
                document.getElementById('cardDetails').style.display = 'block';
            } else if (this.value === 'direct_debit') {
                document.getElementById('bankDetails').style.display = 'block';
            }
        });
    });
    
    // Form validation
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        this.classList.add('was-validated');
    });
    
    // Format card number input
    document.getElementById('cardNumber').addEventListener('input', function(e) {
        this.value = this.value.replace(/\s/g, '').replace(/(\d{4})/g, '$1 ').trim();
    });
    
    // Format expiry date input
    document.getElementById('expiryDate').addEventListener('input', function(e) {
        this.value = this.value.replace(/\D/g, '').replace(/(\d{2})(\d)/, '$1/$2');
    });
</script>
@endpush