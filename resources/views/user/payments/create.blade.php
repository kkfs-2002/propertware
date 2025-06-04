@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-credit-card-2-back fs-3 me-3"></i>
                        <div>
                            <h4 class="mb-0">Payment Information</h4>
                            <p class="mb-0 small opacity-75">Complete your payment securely</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="stepper mb-5">
                        <div class="stepper-progress">
                            <div class="stepper-progress-bar" style="width: 66%"></div>
                        </div>
                        <div class="stepper-items">
                            <div class="stepper-item completed">
                                <div class="stepper-icon">1</div>
                                <span class="stepper-text">Details</span>
                            </div>
                            <div class="stepper-item active">
                                <div class="stepper-icon">2</div>
                                <span class="stepper-text">Payment</span>
                            </div>
                            <div class="stepper-item">
                                <div class="stepper-icon">3</div>
                                <span class="stepper-text">Confirmation</span>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ url('user/payments/store') }}" id="paymentForm">
                        @csrf

                        <!-- Amount Field -->
                        <div class="mb-4">
                            <label for="amount" class="form-label fw-semibold text-dark">Payment Amount <span class="text-danger">*</span></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-currency-dollar"></i></span>
                                <input type="number" step="0.01" min="1" 
                                       class="form-control border-start-0" 
                                       id="amount" name="amount" 
                                       placeholder="0.00" required>
                            </div>
                            @error('amount')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Method Selector -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Payment Method <span class="text-danger">*</span></label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="payment_method" 
                                           id="credit_card" value="credit_card" autocomplete="off" checked required>
                                    <label class="card card-hover h-100 border-2" for="credit_card">
                                        <div class="card-body text-center p-3">
                                            <div class="mb-2">
                                                <i class="bi bi-credit-card fs-2 text-primary"></i>
                                            </div>
                                            <h6 class="mb-0">Credit Card</h6>
                                        </div>
                                    </label>
                                </div>
                                
                               
                                
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="payment_method" 
                                           id="bank_transfer" value="bank_transfer" autocomplete="off">
                                    <label class="card card-hover h-100 border-2" for="bank_transfer">
                                        <div class="card-body text-center p-3">
                                            <div class="mb-2">
                                                <i class="bi bi-bank fs-2 text-primary"></i>
                                            </div>
                                            <h6 class="mb-0">Bank Transfer</h6>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            @error('payment_method')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Credit Card Details (shown by default) -->
                        <div id="credit_card_section" class="bg-light p-4 rounded-3 mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0 fw-semibold">Card Details</h5>
                                <div class="card-icons">
                                    <img src="{{ asset('images/logos/visa.png') }}" width="40" class="me-2" alt="Visa">
                                    <img src="{{ asset('images/logos/master.png') }}" width="40" class="me-2" alt="Mastercard">
                                    <img src="{{ asset('images/logos/amex.png') }}" width="40" alt="American Express">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="card_number" class="form-label">Card Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" id="card_number" name="card_number" 
                                       placeholder="•••• •••• •••• ••••" maxlength="19">
                                @error('card_number')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="expiry_date" class="form-label">Expiry Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="expiry_date" name="expiry_date" 
                                           placeholder="MM/YY" maxlength="5">
                                    @error('expiry_date')
                                        <div class="text-danger small mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="cvv" class="form-label">CVV <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" id="cvv" name="cvv" 
                                               placeholder="•••" maxlength="4">
                                        <span class="input-group-text bg-light" data-bs-toggle="tooltip" 
                                              title="3 or 4 digit security code on back of card">
                                            <i class="bi bi-question-circle"></i>
                                        </span>
                                    </div>
                                    @error('cvv')
                                        <div class="text-danger small mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3">
                                <label for="card_holder" class="form-label">Card Holder Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" id="card_holder" name="card_holder" 
                                       placeholder="Name as shown on card">
                                @error('card_holder')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Bank Transfer Details (hidden by default) -->
                        <div id="bank_details_section" class="bg-light p-4 rounded-3 mb-4" style="display: none;">
                            <h5 class="mb-3 fw-semibold">Bank Transfer Information</h5>
                            
                            <div class="mb-3">
                                <label for="bank_name" class="form-label">Bank Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" id="bank_name" name="bank_name" placeholder="e.g. Chase Bank">
                                @error('bank_name')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="account_number" class="form-label">Account Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="account_number" name="account_number" placeholder="Your account number">
                                    @error('account_number')
                                        <div class="text-danger small mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="routing_number" class="form-label">Routing Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="routing_number" name="routing_number" placeholder="Bank routing number">
                                    @error('routing_number')
                                        <div class="text-danger small mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- PayPal Info (hidden by default) -->
                        <div id="paypal_section" class="alert alert-primary d-flex align-items-center" style="display: none;">
                            <i class="bi bi-info-circle-fill me-3 fs-4"></i>
                            <div>
                                <h6 class="alert-heading mb-2">PayPal Payment</h6>
                                <p class="mb-0">You'll be redirected to PayPal to securely complete your payment after submitting this form.</p>
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold text-dark">Payment Note (Optional)</label>
                            <textarea class="form-control" id="description" name="description" 
                                      rows="2" placeholder="Add any special instructions or reference information"></textarea>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a> <span class="text-danger">*</span>
                            </label>
                            @error('terms')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center border-top pt-4 mt-3">
                            <a href="{{ url('user/payments/list') }}" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left me-2"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="bi bi-lock-fill me-2"></i> Secure Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="termsModalLabel">Payment Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <h6 class="fw-semibold text-primary">Payment Processing</h6>
                    <p>All payments are processed securely through our PCI-DSS compliant payment gateway. We do not store your full payment details on our servers.</p>
                </div>
                
                <div class="mb-4">
                    <h6 class="fw-semibold text-primary">Refund Policy</h6>
                    <p>Refunds will be processed within 5-7 business days if eligible according to our refund policy. Please contact our support team for any refund inquiries.</p>
                </div>
                
                <div class="mb-4">
                    <h6 class="fw-semibold text-primary">Security</h6>
                    <p>We use industry-standard 256-bit SSL encryption to protect your payment information during transmission. Your financial data is handled with the highest security standards.</p>
                </div>

                <div class="alert alert-info">
                    <div class="d-flex">
                        <i class="bi bi-shield-lock fs-4 me-3"></i>
                        <div>
                            <p class="mb-0">This payment form is secured with bank-level encryption. You can verify the security by checking for the padlock icon in your browser's address bar.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">I Understand</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentForm = document.getElementById('paymentForm');
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        const creditCardSection = document.getElementById('credit_card_section');
        const bankDetailsSection = document.getElementById('bank_details_section');
        const paypalSection = document.getElementById('paypal_section');
        
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Format card number
        const cardNumber = document.getElementById('card_number');
        if (cardNumber) {
            cardNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s+/g, '');
                if (value.length > 0) {
                    value = value.match(new RegExp('.{1,4}', 'g')).join(' ');
                }
                e.target.value = value;
            });
        }

        // Format expiry date
        const expiryDate = document.getElementById('expiry_date');
        if (expiryDate) {
            expiryDate.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                e.target.value = value;
            });
        }

        // Payment method toggle
        paymentMethods.forEach(method => {
            method.addEventListener('change', function() {
                if (this.value === 'credit_card') {
                    creditCardSection.style.display = 'block';
                    bankDetailsSection.style.display = 'none';
                    paypalSection.style.display = 'none';
                    
                    // Make credit card fields required
                    document.getElementById('card_number').required = true;
                    document.getElementById('expiry_date').required = true;
                    document.getElementById('cvv').required = true;
                    document.getElementById('card_holder').required = true;
                    
                    // Remove required from other fields
                    document.getElementById('bank_name').required = false;
                    document.getElementById('account_number').required = false;
                    document.getElementById('routing_number').required = false;
                    
                } else if (this.value === 'bank_transfer') {
                    creditCardSection.style.display = 'none';
                    bankDetailsSection.style.display = 'block';
                    paypalSection.style.display = 'none';
                    
                    // Make bank details fields required
                    document.getElementById('bank_name').required = true;
                    document.getElementById('account_number').required = true;
                    document.getElementById('routing_number').required = true;
                    
                    // Remove required from credit card fields
                    document.getElementById('card_number').required = false;
                    document.getElementById('expiry_date').required = false;
                    document.getElementById('cvv').required = false;
                    document.getElementById('card_holder').required = false;
                    
                } else if (this.value === 'paypal') {
                    creditCardSection.style.display = 'none';
                    bankDetailsSection.style.display = 'none';
                    paypalSection.style.display = 'block';
                    
                    // Remove all payment field requirements
                    document.getElementById('card_number').required = false;
                    document.getElementById('expiry_date').required = false;
                    document.getElementById('cvv').required = false;
                    document.getElementById('card_holder').required = false;
                    document.getElementById('bank_name').required = false;
                    document.getElementById('account_number').required = false;
                    document.getElementById('routing_number').required = false;
                }
            });
        });

        // Form validation
        paymentForm.addEventListener('submit', function(e) {
            const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
            let isValid = true;
            
            if (selectedMethod === 'credit_card') {
                // Validate card number (simple check for 16 digits)
                const cardNumber = document.getElementById('card_number').value.replace(/\s/g, '');
                if (cardNumber.length < 16 || !/^\d+$/.test(cardNumber)) {
                    alert('Please enter a valid 16-digit card number');
                    isValid = false;
                }
                
                // Validate expiry date
                const expiry = document.getElementById('expiry_date').value;
                if (!/^\d{2}\/\d{2}$/.test(expiry)) {
                    alert('Please enter a valid expiry date in MM/YY format');
                    isValid = false;
                }
                
                // Validate CVV
                const cvv = document.getElementById('cvv').value;
                if (cvv.length < 3 || !/^\d+$/.test(cvv)) {
                    alert('Please enter a valid CVV (3 or 4 digits)');
                    isValid = false;
                }
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>

<style>
    /* Improved Card Styling */
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        border-color: var(--bs-primary);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .card-hover .card-body {
        transition: all 0.3s ease;
    }
    
    .btn-check:checked + .card {
        border-color: var(--bs-primary) !important;
        background-color: rgba(13, 110, 253, 0.05);
    }
    
    /* Stepper Styles */
    .stepper {
        position: relative;
    }
    
    .stepper-progress {
        height: 4px;
        background-color: #e9ecef;
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        z-index: 1;
    }
    
    .stepper-progress-bar {
        height: 100%;
        background-color: var(--bs-primary);
        transition: width 0.3s ease;
    }
    
    .stepper-items {
        display: flex;
        justify-content: space-between;
        position: relative;
        z-index: 2;
    }
    
    .stepper-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
    }
    
    .stepper-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e9ecef;
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-bottom: 8px;
        border: 3px solid white;
    }
    
    .stepper-item.completed .stepper-icon {
        background-color: var(--bs-primary);
        color: white;
    }
    
    .stepper-item.active .stepper-icon {
        background-color: var(--bs-primary);
        color: white;
    }
    
    .stepper-text {
        font-size: 0.875rem;
        color: #6c757d;
        font-weight: 500;
    }
    
    .stepper-item.completed .stepper-text,
    .stepper-item.active .stepper-text {
        color: var(--bs-primary);
        font-weight: 600;
    }
    
    /* Form Control Styling */
    .form-control-lg {
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }
    
    /* Gradient Header */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
    }
    
    /* Payment Method Icons */
    .card-icons img {
        opacity: 0.7;
        transition: opacity 0.3s;
    }
    
    .card-icons img:hover {
        opacity: 1;
    }
    
    /* Required Field Indicator */
    .text-danger {
        color: #dc3545 !important;
    }
</style>
@endsection